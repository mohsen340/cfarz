<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddCurrencyPageShow()
    {
        $ourCurrencys = DB::table('carcos')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addcarco")
            ->with('pagename','مدیریت شرکت ها')
            ->with('pageaddress','/addcarco')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys);
    }

    public function ListCurrencyShow()
    {
        $ourCurrencys = DB::table('carcos')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('carnames')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addcarname")
            ->with('pagename','مدیریت خودروها')
            ->with('pageaddress','/addcar')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys)
            ->with('datasetList',$ourDatasetCurrencys);
    }

    function CreateCurrency(Request $request)
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
                $image->move(public_path().'/images/CarCos/', $name);
                $data = '/images/CarCos/'. $name;
            }
        }

        DB::table('carcos')->insert(
            ['name' => $request->name,'filename'=>$data]
        );
        return back();
    }

    public function EditCurrency(Request $request)
    {
        DB::table("carcos")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    function CreateDataCurrency(Request $request)
    {
        $this->validate($request, [
//            'filename' => 'required',
//            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = '';
        if($request->hasfile('filename'))
        {
          $image = $request->file('filename')[0];
          $name = $image->getClientOriginalName();
          $image->move('images/Cars', $name);
          $data = 'images/Cars/'. $name;
        }

        DB::table('carnames')->insert(
            ['co_id' => $request->idco,'filename'=>$data, 'name' => $request->name, 'price_free' => $request->freeprice, 'price_co' => $request->coprice, 'status' => 1]
        );
        return back();
    }

    public function EditDataCurrency(Request $request)
    {
        DB::table("carnames")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    public function ListOptionCars()
    {
        $ourCurrencys = DB::table('carnames')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('options')->where('car_id','!=',0)->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/caroptions")
            ->with('pagename','مدیریت امکانات')
            ->with('pageaddress','/caroptions')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys)
            ->with('datasetList',$ourDatasetCurrencys);
    }

    function CreateDataOptions(Request $request)
    {
        DB::table('options')->insert(
            ['car_id' => $request->idcar, 'options' => $request->title, 'values' => $request->value]
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
