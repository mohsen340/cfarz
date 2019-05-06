<?php

namespace App\Http\Controllers;

use App\NewAppDetail;
use Illuminate\Http\Request;

class NewAppsDataController extends Controller
{
    public function antiVirus(){
      $app = NewAppDetail::where('name', 'like', 'anti_virus')->first();
      return response()->json($app, 200 )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function optimizer(){
      $app = NewAppDetail::where('name', 'like', 'optimizer')->first();
      return response()->json($app, 200 )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
