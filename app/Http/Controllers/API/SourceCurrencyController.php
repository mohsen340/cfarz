<?php

namespace App\Http\Controllers\API;

use App\OurVariables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class SourceCurrencyController extends Controller
{
    public function GetCurrency1()
    {
        $Currency = DB::table("sourcecurrency")->where('status',1)->get();
        return $Currency;
    }

    public function GetCurrencyData1($currencyid)
    {
//        $Currency = DB::table("datasetsourcecurrency")->whereIn('sourcecurrency_id',$currencyid)->orderBy('updated_at', 'desc')->limit(30)->get(['sourcecurrency_id','price','updated_at']);
        $Currency = DB::table("datasetsourcecurrency")->whereIn('sourcecurrency_id',$currencyid)->orderBy('sourcecurrency_id', 'asc')->orderBy('updated_at', 'desc')->limit(100)->get(['sourcecurrency_id','price','updated_at']);
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
            return response()->json(['Currency' => $Currency,'Scurrency' => $newDCu],200);
        }
            return response()->json(['message' => 'un_authorized'],401);
    }
}
