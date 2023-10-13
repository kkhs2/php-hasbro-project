<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Classes\File;
use session;
class ClearSessionController extends Controller
{
    //
    public function index(Request $request) {
      $request = $request->all();
      if ($request['clearSession']) {
        $token = session()->get('_token');
        DB::delete('DELETE p, c FROM products p JOIN currencies c ON p.token = c.token WHERE p.token = ' . '"' . $token . '"');
        //$files = glob(dirname(__DIR__) . '\..\..' . File::STORAGE_DIR);
        session()->flush();
        return back()->with('success', 'Your session has been successfully refreshed.');
      }
    }
}
