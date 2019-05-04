<?php

namespace App\Http\Controllers\API;

use App\OurVariables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class CarsController extends Controller
{
    function GetBrands()
    {
        $Currency = DB::table("carcos")->where('status', 1)->get();
        return $Currency;
    }

    function GetMobileNames()
    {
        $Currency = DB::table("carnames")->where('status', 1)->orderBy('updated_at', 'desc')->get();
        return $Currency;
    }

    function GetCarOptions()
    {
        $Currency = DB::table("options")->where('car_id','!=',0)->get(['car_id','options','values']);
        return $Currency;
    }

    function GetOrginalCurrency(Request $request)
    {
        if($request->header('auth')==OurVariables::$authkey)
        {
            $MobileNames = $this->GetMobileNames();
            foreach ($MobileNames as $ID)
            {
                $DCurrency[] = $ID->id;
            }
            $Brands = $this->GetBrands();
            $Options = $this->GetCarOptions();
            return response()->json(['CarCos' => $Brands,'CarNames' => $MobileNames,'CarOptions'=>$Options],200);
        }
            return response()->json(['message' => 'un_authorized'],401);
    }
}
