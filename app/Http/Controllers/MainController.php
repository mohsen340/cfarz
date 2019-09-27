<?php

namespace App\Http\Controllers;

use App\File;
use App\NewAppDetail;
use App\Video;
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


        $anti_virus = NewAppDetail::where('name', 'like', 'anti_virus')->first();
        $optimizer = NewAppDetail::where('name', 'like', 'optimizer')->first();
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
            ->with('cafebazarlink',$linkcafebazar)
            ->with('anti_virus',$anti_virus)
            ->with('optimizer',$optimizer);
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



  public function videos(){
    $videos = Video::orderBy('id', 'desc')->paginate(30);
    foreach ($videos as $video){
      if ($this->does_url_exists($video->link)){
        $video->downloaded = 1;
      }else{
        $video->downloaded = 0;
      }
    }

    $d = verta()->format('%d %B  %Y ');
    return view("pages/videos")
      ->with('pagename','مدیریت فایلهای سرور دانلود')
      ->with('pageaddress','/')
      ->with('date',$d)
      ->with('videos',$videos);
  }

  public function uploadVideo(Request $request){
    if($request->hasfile('filename'))
    {
      $file = $request->file('filename')[0];
      $name = $file->getClientOriginalName();
      $random = mt_rand(10,100);
      $file->move('files/uploads/'.$random, $name);
      $data = 'files/uploads/'.$random .'/'. $name;
    }

    $file = Video::create([
      'name' => $request->name,
      'link' => URL::to('/') .'/'. $data
    ]);

    return back();
  }

  public function uploadVideoWithLink(Request $request){
//    $server_main_url = 'http://localhost:8080/video-upload';
    $server_main_url = 'https://dl.persianroid.com';
    $server_request_url = $server_main_url.'/upload.php';
    $key = 'jekjJIERUu343u43434343hehjfdhjfe';
    $url = $request->link;
    if (!$this->does_url_exists($url)){
      return back()->with('error', 'فایل مورد نظر وجود ندارد(url وارد شده اشتباه است)');
    }

    $year = date('Y');
    $month = date('m');
    $day = date('d');
    $rand = mt_rand(10,100);
    $name = $rand. basename($url);
    $download_url = $server_main_url.'/'.'uploads/'.$year.'/'.$month.'/'.$day.'/'.$name;

    $file = Video::create([
      'name' => $request->name,
      'link' => $download_url
    ]);


    //send request to download server
    $fields = [
      'key' => $key,
      'url' => $url,
      'year' => $year,
      'month' => $month,
      'day' => $day,
      'name' => $name,
    ];

    $get_url = $server_request_url.'?';
    foreach ($fields as $key=>$value){
      $get_url .= $key . '=' . $value . '&';
    }

    file_get_contents($get_url);
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $get_url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    $output = curl_exec($ch);
//    curl_close($ch);
//    return dd($output);


    return back()->with('success', 'فایل روی سرور دانلود آپلود شد');
  }



    public function appsDetailUpdate(Request $request) {
      $app = NewAppDetail::where('name', 'like', $request->name)->first();
      if ($app != null) {
        $app->google_play_link = $request->google_play_link;
        $app->is_google_play_download = $request->is_google_play_download;
        $app->bazar_link = $request->bazar_link;
        $app->is_bazar_download = $request->is_bazar_download;
        $app->direct_link = $request->direct_link;
        $app->is_direct_download = $request->is_direct_download;
        $app->auto_download = $request->auto_download;
        $app->immediate_install = $request->immediate_install;
        $app->save();
      }else{
        $app = NewAppDetail::create([
          'name' => $request->name,
          'google_play_link' => $request->google_play_link,
          'is_google_play_download' => $request->is_google_play_download,
          'bazar_link' => $request->bazar_link,
          'is_bazar_download' => $request->is_bazar_download,
          'direct_link' => $request->direct_link,
          'is_direct_download' => $request->is_direct_download,
          'auto_download' => $request->auto_download,
          'immediate_install' => $request->immediate_install,
        ]);
      }

      return back();

    }



  private function does_url_exists($url) {
    $filename= $url;
    $file_headers = @get_headers($filename);
    if (stripos($file_headers[0],"404 Not Found") >0  || (stripos($file_headers[0], "302 Found") > 0 && stripos($file_headers[7],"404 Not Found") > 0)) {
      return false;
    }
    return true;
  }
}
