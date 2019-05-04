<?php

namespace App\Http\Controllers\API;

use App\OurVariables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class CurrencyController extends Controller
{
    function GetCurrency()
    {
        $Currency = DB::table("currency")->where('status',1)->get();
        return $Currency;
    }

    function GetCurrencyData($currencyid)
    {
        $Currency = DB::table("datasetcurrency")->whereIn('currency_id',$currencyid)->orderBy('updated_at', 'desc')->limit(30)->get(['currency_id','price','updated_at']);
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
            return response()->json(['Currency' => $Currency,'Dcurrency' => $newDCu],200);
        }
            return response()->json(['message' => 'un_authorized'],401);
    }
}
