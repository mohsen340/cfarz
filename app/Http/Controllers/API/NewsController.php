<?php

namespace App\Http\Controllers\API;

use App\OurVariables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class NewsController extends Controller
{
  function GetAppDetail()
  {
    $Currency = DB::table("application")->get();
    return $Currency;
  }

  function GetCatgoryNewsPapers()
  {
    $Currency = DB::table("newspapercats")->get();
    return $Currency;
  }

  function GetNewsPapers()
  {
    $Currency = DB::table("newspapers")->orderBy('updated_at', 'desc')->get();
    return $Currency;
  }

  function GetNews()
  {
    $Currency = DB::table("news")->get();
    return $Currency;
  }

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
    $Currency = DB::table("datasetmobiles")->whereIn('mobile_id',$currencyid)->orderBy('updated_at', 'desc')->limit(1000)->get(['mobile_id','price','updated_at']);
    return $Currency;
  }

  function GetMobileOptions()
  {
    $Currency = DB::table("options")->where('mobile_id','!=',0)->get(['mobile_id','options','values']);
    return $Currency;
  }

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

  function GetSCurrency()
  {
    $Currency = DB::table("sourcecurrency")->where('status',1)->get();
    return $Currency;
  }

  function GetSCurrencyData($currencyid)
  {
    $Currency = DB::table("datasetsourcecurrency")->whereIn('sourcecurrency_id',$currencyid)->orderBy('updated_at', 'desc')->limit(300)->get(['sourcecurrency_id','price','updated_at']);
    return $Currency;
  }

  function GetGold()
  {
    $Currency = DB::table("gold")->where('status',1)->get();
    return $Currency;
  }

  function GetGoldData($currencyid)
  {
    $Currency = DB::table("datasetgold")->whereIn('gold_id',$currencyid)->orderBy('updated_at', 'desc')->limit(30)->get(['gold_id','price','updated_at']);
    return $Currency;
  }


  function GetDCurrency()
  {
    $Currency = DB::table("digitalcurrency")->where('status',1)->get();
    return $Currency;
  }

  function GetDCurrencyData($currencyid)
  {
    $Currency = DB::table("datasetdigitalcurrency")->whereIn('digitalcurrency_id',$currencyid)->orderBy('updated_at', 'desc')->limit(30)->get(['digitalcurrency_id','price','updated_at']);
    return $Currency;
  }

  function GetOCurrency()
  {
    $Currency = DB::table("currency")->where('status',1)->orderBy('priority', 'asc')->get();
    return $Currency;
  }

  function GetOCurrencyData($currencyid)
  {
    $Currency = DB::table("datasetcurrency")->whereIn('currency_id',$currencyid)->orderBy('updated_at', 'desc')->limit(30)->get(['currency_id','price','updated_at']);
    return $Currency;
  }

  function GetBrandsC()
  {
    $Currency = DB::table("carcos")->where('status', 1)->get();
    return $Currency;
  }

  function GetMobileNamesC()
  {
    $Currency = DB::table("carnames")->where('status', 1)->orderBy('updated_at', 'desc')->get();
    return $Currency;
  }

  function GetCarOptionsC()
  {
    $Currency = DB::table("options")->where('car_id','!=',0)->get(['car_id','options','values']);
    return $Currency;
  }

  public function GetOriginalApp(Request $request)
  {
    if($request->header('auth')==OurVariables::$authkey)
    {

      //find scurrency
      $SCurrencyController = new SourceCurrencyController();

      $Currency1 = $SCurrencyController->GetCurrency1();
      $DCurrency1 = array();
      foreach ($Currency1 as $ID)
      {
        $DCurrency1[] = $ID->id;
      }
      $newDCu1 = $SCurrencyController->GetCurrencyData1($DCurrency1);





      $Categoryt = $this->GetAppDetail();
      $Category = $this->GetCatgoryNewsPapers();
      $NewsPapers = $this->GetNewsPapers();
      $News = $this->GetNews();
      $MobileNames = $this->GetMobileNames();
      foreach ($MobileNames as $ID)
      {
        $DCurrencyone[] = $ID->id;
      }
      $newDCu = $this->GetMobileDatas($DCurrencyone);
      $Brands = $this->GetBrands();
      $Options = $this->GetMobileOptions();
      $Currency = $this->GetCurrency();
      foreach ($Currency as $ID)
      {
        $DCurrencytwo[] = $ID->id;
      }

      $newDCus = $this->GetCurrencyData($DCurrencytwo);
      $SCurrency = $this->GetSCurrency();
      foreach ($Currency as $ID)
      {
        $DCurrencyT[] = $ID->id;
      }
      $newSDCu = $this->GetSCurrencyData($DCurrencyT);
      $Gold = $this->GetGold();
      foreach ($Gold as $ID)
      {
        $DGold[] = $ID->id;
      }
      $newDCuG = $this->GetGoldData($DGold);
      $DCurrency = $this->GetDCurrency();
      foreach ($DCurrency as $ID)
      {
        $DDCurrency[] = $ID->id;
      }
      $newDCuD = $this->GetDCurrencyData($DDCurrency);
      $OCurrency = $this->GetOCurrency();
      foreach ($OCurrency as $ID)
      {
        $ODCurrency[] = $ID->id;
      }

      $newDCuO = $this->GetOCurrencyData($ODCurrency);
      $MobileNamesC = $this->GetMobileNamesC();
      foreach ($MobileNamesC as $ID)
      {
        $DCurrencyC[] = $ID->id;
      }
      $BrandsC = $this->GetBrandsC();
      $OptionsC = $this->GetCarOptionsC();







      return response()->json(['CarCos' => $BrandsC,'CarNames' => $MobileNamesC,'CarOptions'=>$OptionsC,'Currency' => $OCurrency,'Dcurrency' => $newDCuO,'DDCurrency' => $DCurrency,'Ddcurrency' => $newDCuD,'Golds' => $Gold,'Dgold' => $newDCuG,'SCurrency' => $Currency1,'SDcurrency' => $newDCu1,'Coins' => $Currency,'Dcoins' => $newDCus,'AppDetail' => $Categoryt,'CategoryNewspapers' => $Category,'NewsPapers' => $NewsPapers,'News'=>$News,'MobileBrands' => $Brands,'MobileNames' => $MobileNames,'Dmobiles'=>$newDCu,'MobileOptions'=>$Options],200);
    }
    return response()->json(['message' => 'un_authorized'],401);
  }













  function CreateSubscribe($pushid,$idsubscribe,$table,$type,Request $request)
  {
    if($request->header('auth')==OurVariables::$authkey)
    {
      if($type=="1")
      {
        $result = DB::table('subscribers')->insert(
          ['pusheid' => $pushid, 'sub_id' => $idsubscribe, 'table' => $table]
        );
        if($result)
          return response()->json(['message' => 'success'],200);
        else
          return response()->json(['message' => 'failed'],409);
      }
      else
      {
        $result =DB::table('subscribers')->where('pusheid', '=', $pushid)->where('sub_id', '=', $idsubscribe)->where('table', '=', $table)->delete();
        return response()->json(['message' => 'success'],200);
      }

    }

    return response()->json(['message' => 'un_authorized'],401);
  }
}
