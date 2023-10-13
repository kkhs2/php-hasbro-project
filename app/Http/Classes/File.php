<?php 
namespace App\Http\Classes;
use DB;

/* using shuchkin external libraries for the reading and exporting of xlsx files  */
use Shuchkin\SimpleXLSX;
use Shuchkin\SimpleXLSXGen;

use App\Http\Classes\Database;
use Exception;

class File {
  const MAX_SIZE = 100000000;
  const ALLOWED_FORMAT = 'xlsx';
  const STORAGE_DIR = '\storage\app\public\hasbro\\';

  private int $size;
  private string $type;
  private string $path;
  private string $tempPath;
  private string $name;

  private string $token;

  
  public function __construct(private array $file) {
    $this->path = dirname(__DIR__) . '\..\..' . File::STORAGE_DIR . $file['token'] . '_' . basename($file['name']);
    $this->type = strtolower(pathinfo($this->getPath(), PATHINFO_EXTENSION));
    $this->size = $file['size'];
    $this->tempPath = $file['tmp_name'];
    $this->name = $file['name'];
    $this->token = $file['token'];

  }


  public function getSize() {
    return $this->size;
  }

  public function getType() {
    return $this->type;
  }

  public function getPath() {
    return $this->path;
  }

  public function getTempPath() {
    return $this->tempPath;
  }

  public function getName() {
    return $this->name;
  }

  public function getToken() {
    return $this->token;
  }


  public function checkSize() {
    if ($this->getSize() < File::MAX_SIZE) {
      return true;
    }
  }
  public function checkType() {
    if ($this->getType() == File::ALLOWED_FORMAT) {
      return true;
    }
  }

  public function checkExists() {
    if (!file_exists($this->getPath())) {
      return true;
    }
  }

  public function checkMoveFile() {
    if (move_uploaded_file($this->getTempPath(), $this->getPath())) {
      return true;
    }
  }

  /*this is to check against the file token in the DB with the user session, so that one session ID cannot have multiple files with different file names uploaded */ 
  

  public function insertFile() {
    
    $table = new Database('File');
    $insert = $table->save([
      'name' => $this->getName(), 
      'size' => $this->getSize(), 
      'token' => $this->getToken()
    ]);
  }

  public function columns($values) {
    if ($values == '£1 =') {
      $values = str_replace('£1 =', 'conversion', $values);
    }
    /* convert column headings to lower case */
    return strtolower($values);
  }

  public function insertFileData() {
    $fileReader = SimpleXLSX::parse($this->getPath());
    $sheets = $fileReader->sheetNames();
    $queriesArray = [];
    foreach ($sheets as $s => $sheet) {
      $table = new Database(strtolower($sheet));
      /* check to see if sheet names match the database tables */
      if (!$table->tableExists()) {
        return false;
      }

      $tokenExist = $table->select('token', $this->getToken());
      if ($tokenExist) {
        $table->save(['token' => $this->getToken()], 'delete');
      }
 
      foreach ($fileReader->rows($s) as $row => $value) {
        if ($row === 0) {
          /* a cheat here - the currencies sheet provided column name of £1 =, so manually renaming this to "conversion"*/
          $value = array_map(array($this, 'columns'), $value);

          //regex to clean up column names so that there are no non-alphanumeric characters allowed
          $pattern = '/\W/i';
          $header_values = preg_replace($pattern, '', $value);
          //add token column
          array_push($header_values, 'token');
          continue;
        }
        
        //check if there are blank values
        if ($value != array_filter($value)) {
          return false;
        }

        //add token value
        array_push($value, $this->getToken());

        //combine array so the array will have named keys and values
        $values = array_combine($header_values, $value);
        
        /* commented out below, so we are using transactional query to rollback should we encounter problems adding to the DB, so records which were added successfully first are rolled back */
        /*$insert = $table->save($values, 'insert');
        if ($insert == 0) {
          return 0;
        } else {
          return $insert;
        }*/
        array_push($queriesArray, ['type' => 'insert', 'table' => strtolower($sheet), 'values' => $values]);
      }
    }
    /* hard coded check for sheet names, so they have to contain "products" and "currencies" to ensure that users cannot submit a file with only one valid sheet and data values */
    $tableNames = array_column($queriesArray, 'table');
    if (!in_array('products', $tableNames) || !in_array('currencies', $tableNames)) {
      return false;
    }

    $insertFileData = $table->saveTransactionalQuery($queriesArray);
    return $insertFileData;
  }

  public function exportFile($xlsxArr) {
    $xlsx = SimpleXLSXGen::fromArray($xlsxArr);
    $xlsx->downloadAs('export.xlsx');
    $deleteProducts = DB::table('products')->truncate();
    $deleteCurrencies = DB::table('currencies')->truncate();
    if ($deleteProducts && $deleteCurrencies) {
      return true;
    }
  }
}