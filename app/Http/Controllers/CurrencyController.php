<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddCurrencyPageShow()
    {
        $ourCurrencys = DB::table('currency')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addcurrency")
            ->with('pagename','مدیریت ارزها')
            ->with('pageaddress','/addcurrency')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys);
    }

    public function ListCurrencyShow()
    {
        $ourCurrencys = DB::table('currency')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('datasetcurrency')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/datacurrency")
            ->with('pagename','مدیریت دیتای ارزها')
            ->with('pageaddress','/listcurrency')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys)
            ->with('datasetList',$ourDatasetCurrencys);
    }

    function CreateCurrency(Request $request)
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
        $image->move('images/currency', $name);
        $data = 'images/currency/'. $name;
      }

        DB::table('currency')->insert(
            ['name' => $request->name, 'inc_dec' => $request->inc,
              'chart_show' => $request->chart,'connected_id'=>$request->connect,
              'status' => $request->status,'filename'=>$data,
              'priority' => $request->priority]
        );
        return back();
    }

    public function EditCurrency(Request $request)
    {
        DB::table("currency")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    function CreateDataCurrency(Request $request)
    {
        DB::table('datasetcurrency')->insert(
            ['currency_id' => $request->idcurrency, 'price' => $request->price]
        );
        return back();
    }

    public function EditDataCurrency(Request $request)
    {
        DB::table("datasetcurrency")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }




}
