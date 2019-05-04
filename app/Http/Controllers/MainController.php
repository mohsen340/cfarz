<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Dashboard()
    {
        $appdetail = DB::table("application")->where("id","1")->get();
        $newspapers = DB::table("newspapers")->count();
        $news = DB::table("news")->count();
        $cars = DB::table("carnames")->count();
        $mobile = DB::table("mobilenames")->count();
        $gold = DB::table("gold")->count();
        $coin = DB::table("coins")->count();
        $sourcecurrency = DB::table("sourcecurrency")->count();
        $currency = DB::table("currency")->count();

        foreach ($appdetail as $item) {

            $force = $item->force;
            $ads_time = $item->ads_time;
            $activeversion = $item->app_version;
            $activeall= $item->activeadsforchart;
            $activecafebazar= $item->activebazaar;
            $activegoogle= $item->activegoogleplay;
            $activedirect= $item->activedirect;
            $linkcafebazar= $item->linkebazaar;
            $linkgoogle= $item->linkgoogleplay;
            $linkdirect= $item->linkdirect;
            $unitbanner= $item->unitbanner;
            $unitinter= $item->unitinter;
            $unitgift= $item->unitgift;
            $timefree= $item->timefree;
            $resource = $item->resource;
        }

        $d = verta()->format('%d %B  %Y ');
        return view("pages/index")
            ->with('pagename','پیشخوان')
            ->with('pageaddress','/')
            ->with('date',$d)
            ->with('versionOfApp',$activeversion)
            ->with('UpdateStatus',$force)
            ->with('AdsTime',$ads_time)
            ->with('newspapers',$newspapers)
            ->with('news',$news)
            ->with('cars',$cars)
            ->with('mobile',$mobile)
            ->with('gold',$gold)
            ->with('coin',$coin)
            ->with('sourcecurrency',$sourcecurrency)
            ->with('currency',$currency)
            ->with('activeall',$activeall)
            ->with('activedirect',$activedirect)
            ->with('directlink',$linkdirect)
            ->with('activegoogle',$activegoogle)
            ->with('googleplaylink',$linkgoogle)
            ->with('activecafebazar',$activecafebazar)
            ->with('unitbanner',$unitbanner)
            ->with('unitinter',$unitinter)
            ->with('unitgift',$unitgift)
            ->with('timefree',$timefree)
            ->with('resource',$resource)
            ->with('cafebazarlink',$linkcafebazar);
    }

    public function EditAdsInfo(Request $request)
    {
        DB::table("application")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }


    public function files(){
      $files = File::orderBy('id', 'desc')->paginate(30);
      $d = verta()->format('%d %B  %Y ');
      return view("pages/files")
        ->with('pagename','مدیریت فایلها')
        ->with('pageaddress','/')
        ->with('date',$d)
        ->with('files',$files);
    }


    public function uploadFile(Request $request){
      if($request->hasfile('filename'))
      {
        $file = $request->file('filename')[0];
        $name = $file->getClientOriginalName();
        $random = mt_rand(10,100);
        $file->move('files/uploads/'.$random, $name);
        $data = 'files/uploads/'.$random .'/'. $name;
      }

      $file = File::create([
        'name' => $request->name,
        'link' => URL::to('/') .'/'. $data
      ]);

      return back();

    }


    public function uploadFileWithLink(Request $request){
      $url = $request->link;
      $file = file_get_contents($url);
      $rand = mt_rand(10,100);
      $name = basename($url); // to get file name
//      $ext = pathinfo($url, PATHINFO_EXTENSION); // to get extension
//      $name2 =pathinfo($url, PATHINFO_FILENAME); //file name without extension
      $fileName = $name;
      $path = 'files/uploads/'.$rand.'/'.$fileName;
      $path = 'files/uploads/'.$fileName;
      file_put_contents($path, $file);

//      $file->move('files/uploads/'.$rand, $fileName);
//      $data = 'files/uploads/'.$rand .'/'. $fileName;

      $file = File::create([
        'name' => $request->name,
        'link' => URL::to('/') .'/'. $path
      ]);

      return back();
    }
}
