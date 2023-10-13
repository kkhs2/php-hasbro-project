<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shuchkin\SimpleXLSXGen;

class DownloadController extends Controller
{
    //
    public function index() {
      /*$xlsx = SimpleXLSXGen::fromArray(session()->get('exportData'));
      $xlsx->downloadAs('export.xlsx');
      session()->regenerate();*/
    }
}
