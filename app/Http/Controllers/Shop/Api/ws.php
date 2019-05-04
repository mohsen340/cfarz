<?php

namespace App\Http\Controllers\Shop\Api;


class ws {
  public static $authkey = '81.e[UaHaR8I,/t,qA}<ozm-6?$SxgC-&~%c>8yM=nG:_s_dTxYNb@|P%L$';

  public static function r($status, $data, $httpCode = 200, $message = ''){
    return response()->json(['status' => $status, 'message' => $message, 'data' => $data], $httpCode )->setEncodingOptions(JSON_UNESCAPED_UNICODE);
  }
}