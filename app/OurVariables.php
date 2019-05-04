<?php
/**
 * Created by PhpStorm.
 * User: Mahdi
 * Date: 28/09/2018
 * Time: 05:11 PM
 */

namespace App;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class OurVariables
{
    public static $authkey = '81.e[UaHaR8I,/t,qA}<ozm-6?$SxgC-&~%c>8yM=nG:_s_dTxYNb@|P%L$';

    public static function SendPush($tablename,$sid)
    {
        /// Fill It!
        $subscribersPushId = DB::table($tablename)->where('sub_id',$sid)->get(['pusheid']);
        $client = new Client();
        $res = $client->request('POST', 'http://api.pushe.co/v2/messaging/notifications/', [
            'form_params' => [
                'authorization' => 'test_id',
                'secret' => 'test_secret',
            ]
        ]);
        echo $res->getStatusCode();
        // "200"
        echo $res->getHeader('content-type: application/json');
        // 'application/json; charset=utf8'
        echo $res->getBody();
    }
}