<?php

namespace App\Http\Controllers\API;

use App\OurVariables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class MobilesController extends Controller
{
    function GetBrands()
    {
        $Currency = DB::table("mobilebrands")->where('status',1)->get();
        return $Currency;
    }

    function GetMobileNames()
    {
        $Currency = DB::table("mobilenames")->where('status', 1)->orderBy('updated_at', 'desc')->get(['id','brand_id','filename','name','updated_at']);
        return $Currency;
    }

    function GetMobileDatas($currencyid)
    {
        $Currency = DB::table("datasetmobiles")->whereIn('mobile_id',$currencyid)->orderBy('updated_at', 'desc')->limit(30)->get(['mobile_id','price','updated_at']);
        return $Currency;
    }

    function GetMobileOptions()
    {
        $Currency = DB::table("options")->where('mobile_id','!=',0)->get(['mobile_id','options','values']);
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
            $newDCu = $this->GetMobileDatas($DCurrency);
            $Brands = $this->GetBrands();
            $Options = $this->GetMobileOptions();
            return response()->json(['MobileBrands' => $Brands,'MobileNames' => $MobileNames,'Dmobiles'=>$newDCu,'MobileOptions'=>$Options],200);
        }
            return response()->json(['message' => 'un_authorized'],401);
    }
}
