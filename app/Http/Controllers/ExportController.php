<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Classes\Database;
use App\Http\Classes\File;
use session;
use Shuchkin\SimpleXLSX;
use Shuchkin\SimpleXLSXGen;


class ExportController extends Controller
{
    //
    private $table;
    public function index() {
      $table = new Database('currencies');
      $currencies = $table->select('token', session()->get('_token'));
      return view('export', [
        'currencies' => $currencies
      ]); 
    }

    public function exportFile(Request $request) {
      $currency = $request['currency'];
    
      $currenciesTable = new Database('currencies');
      $productsTable = new Database('products');
      //$conversion = $currenciesTable->select('country', $currency);
      
      /* only get products for the current session token, cheated a bit with the method below */
      $conversion = $currenciesTable->selectCurrenciesFromToken($currency, session()->get('_token'));
      $products = $productsTable->selectColsFrom(['sku', 'name', 'stock', 'price'], 'token', session()->get('_token'));
      $conversionRate = $conversion[0]->conversion;

      $xlsxArr = [];

      //get column names from table but excluding the ones not needed in export file
      $columns = $productsTable->showColsExclude(['id', 'token', 'created']);

      //adding heading columns for the first row in the file
      array_push($xlsxArr, array_column((array) $columns, 'Field'));
 
      /* prepare data for the export file */
      foreach($products as $key => $product) {
        $product->price *= $conversionRate;
        $product->price = number_format($product->price, 2);
        array_push($xlsxArr, (array) $product);
      }
     
      /* if I try to pass export to create a new File object and initiate the export process from the exportFile method in the File class, for some unknown reason downloading the file returns a warning/error, so I'll do this part using procedural code /*

      /* 
      $export = session()->get('uploadedFile');
      $exportFile = new File($export);

      $exported = $exportFile->exportFile($xlsxArr); */

      /* cannot download file and then redirect the user, so have to try redirecting to an "after" page first and then attempt to download, otherwise we can skip this redirect part and leave the user on this page and download file... which is perhaps not the best user experience? */
    /*  return redirect('/download')->with('success', 'You have successfully exported the sheet with price showing in ' . $currency)->with('exportData', $xlsxArr); */

      $xlsx = SimpleXLSXGen::fromArray($xlsxArr);
      $xlsx->downloadAs($currency . '_export.xlsx');
    }
}
