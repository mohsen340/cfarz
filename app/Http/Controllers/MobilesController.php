<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddCurrencyPageShow()
    {
        $ourCurrencys = DB::table('mobilebrands')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addmobilebrand")
            ->with('pagename','مدیریت برندها')
            ->with('pageaddress','/addmobilebrand')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys);
    }

    public function ListCurrencyShow()
    {
        $ourCurrencys = DB::table('mobilebrands')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('mobilenames')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addmobilename")
            ->with('pagename','مدیریت موبایل ها')
            ->with('pageaddress','/addmobile')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys)
            ->with('datasetList',$ourDatasetCurrencys);
    }

    function CreateCurrency(Request $request)
    {
//        $this->validate($request, [
//            'filename' => 'required',
//            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
//        ]);

      $data = '';
      if($request->hasfile('filename'))
      {
        $image = $request->file('filename')[0];
        $name = $image->getClientOriginalName();
        $image->move('images/mobilebrands', $name);
        $data = 'images/mobilebrands/'. $name;
      }

        DB::table('mobilebrands')->insert(
            ['name' => $request->name,'filename'=>$data]
        );
        return back();
    }

    public function EditCurrency(Request $request)
    {
        DB::table("mobilebrands")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    function CreateCurrencyT(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/mobiles/', $name);
                $data = '/images/mobiles/'. $name;
            }
        }

        DB::table('mobilenames')->insert(
            ['name' => $request->name,'brand_id'=> $request->idbrand,'filename'=>$data,'status'=>1]
        );
        return back();
    }

    public function EditCurrencyT(Request $request)
    {
        DB::table("mobilenames")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }


    public function ListDatasetMobiles()
    {
        $ourCurrencys = DB::table('mobilenames')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('datasetmobiles')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/datasetmobile")
            ->with('pagename','مدیریت دیتاها')
            ->with('pageaddress','/listmobile')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys)
            ->with('datasetList',$ourDatasetCurrencys);
    }

    function CreateDataCurrency(Request $request)
    {
//        DB::table('datasetmobiles')->insert(
//            ['mobile_id' => $request->idmobile, 'price' => $request->price]
//        );
        DB::insert("insert into datasetmobiles (mobile_id, price)
        values ('$request->idmobile', '$request->price')");
        return back();
    }

    public function EditDataCurrency(Request $request)
    {
//        DB::table("datasetmobiles")
//            ->where('id',$request->id)
//            ->update(array($request->column => $request->editval));
    }

    public function ListOptionMobiles()
    {
        $ourCurrencys = DB::table('mobilenames')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('options')->where('mobile_id','!=',0)->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/mobileoptions")
            ->with('pagename','مدیریت امکانات')
            ->with('pageaddress','/mobileoptions')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys)
            ->with('datasetList',$ourDatasetCurrencys);
    }

    function CreateDataOptions(Request $request)
    {
        DB::table('options')->insert(
            ['mobile_id' => $request->idmobile, 'options' => $request->title, 'values' => $request->value]
        );
        return back();
    }


    public function EditDataOptions(Request $request)
    {
        DB::table("options")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }
}
