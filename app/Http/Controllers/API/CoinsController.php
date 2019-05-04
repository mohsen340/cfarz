<?php

namespace App\Http\Controllers\API;

use App\OurVariables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class CoinsController extends Controller
{
    function GetCurrency()
    {
        $Currency = DB::table("coins")->where('status',1)->get();
        return $Currency;
    }

    function GetCurrencyData($currencyid)
    {
        $Currency = DB::table("datasetcoins")->whereIn('coins_id',$currencyid)->orderBy('updated_at', 'desc')->limit(30)->get(['coins_id','price','updated_at']);
        return $Currency;
    }

    function GetOrginalCurrency(Request $request)
    {
        if($request->header('auth')==OurVariables::$authkey)
        {
            $Currency = $this->GetCurrency();
            foreach ($Currency as $ID)
            {
                $DCurrency[] = $ID->id;
            }
            $newDCu = $this->GetCurrencyData($DCurrency);
            return response()->json(['Coins' => $Currency,'Dcoins' => $newDCu],200);
        }
            return response()->json(['message' => 'un_authorized'],401);
    }
}
