<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\File;
use session;
use App\Exceptions\Handler;

class ImportController extends Controller {
    //

    public function index() {
      return view('import');
    }  

    public function uploadFile(Request $request) {  
      
      if (!isset($request['uploadFile'])) {
        return back()->with('error', 'Sorry we cannot initiate the upload process, please try again later.');
      }

     
      $addToken = $_FILES['uploadFile']['token'] = session()->get('_token');

      $newFile = new File($_FILES['uploadFile']);
          
      /* validation on whether file is already in the directory, size and type */
      
      if (!$newFile->checkExists()) {
        return back()->with('error', 'Sorry a file with the same name already exists. You could try uploading with a new file name, or use the clear session function on the home page and clear your existing files.');
      }

      if (!$newFile->checkSize()) {
        return back()->with('error', 'Sorry, your file exceeds the size limit allowed for this functionality.');
      }

      if (!$newFile->checkType()) {
        return back()->with('error', 'You can only use this functionality with xlsx files.');
      }

      /* checks passed, now attempt the upload process */
      if ($newFile->checkMoveFile()) {
        //$insertFile = $newFile->insertFile();
        $insertFileData = $newFile->insertFileData();
        if ($insertFileData) {
          return redirect('/export')->with('success', 'Your file has been uploaded successfully.');
        }
        return back()->with('error', 'Sorry we could not upload your file. Please ensure that the file has the correct sheet names, column names and associated data values.');
      }
    }
  }