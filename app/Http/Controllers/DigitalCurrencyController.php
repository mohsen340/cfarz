<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DigitalCurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddCurrencyPageShow()
    {
        $ourCurrencys = DB::table('digitalcurrency')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/adddcurrency")
            ->with('pagename','مدیریت ارزها دیجیتال')
            ->with('pageaddress','/adddcurrency')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys);
    }

    public function ListCurrencyShow()
    {
        $ourCurrencys = DB::table('digitalcurrency')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('datasetdigitalcurrency')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/datadcurrency")
            ->with('pagename','مدیریت دیتاها')
            ->with('pageaddress','/listdcurrency')
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
        $image->move('images/dcurrency', $name);
        $data = 'images/dcurrency/'. $name;
      }

        DB::table('digitalcurrency')->insert(
            ['name' => $request->name, 'inc_dec' => $request->inc, 'chart_show' => $request->chart, 'status' => $request->status,'filename'=>$data]
        );
        return back();
    }

    public function EditCurrency(Request $request)
    {
        DB::table("digitalcurrency")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    function CreateDataCurrency(Request $request)
    {
        DB::table('datasetdigitalcurrency')->insert(
            ['digitalcurrency_id' => $request->idcurrency, 'price' => $request->price]
        );
        return back();
    }

    public function EditDataCurrency(Request $request)
    {
        DB::table("datasetdigitalcurrency")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }
}
