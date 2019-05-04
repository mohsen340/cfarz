<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddCurrencyPageShow()
    {
        $ourCurrencys = DB::table('coins')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addcoin")
            ->with('pagename','مدیریت سکه ها')
            ->with('pageaddress','/addcoin')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys);
    }

    public function ListCurrencyShow()
    {
        $ourCurrencys = DB::table('coins')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('datasetcoins')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/datacoin")
            ->with('pagename','مدیریت دیتاها')
            ->with('pageaddress','/listcoin')
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
        $image->move('images/coins', $name);
        $data = 'images/coins/'. $name;
      }

        DB::table('coins')->insert(
            ['name' => $request->name, 'inc_dec' => $request->inc, 'chart_show' => $request->chart, 'status' => $request->status,'filename'=>$data]
        );
        return back();
    }

    public function EditCurrency(Request $request)
    {
        DB::table("coins")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    function CreateDataCurrency(Request $request)
    {
        DB::table('datasetcoins')->insert(
            ['coins_id' => $request->idcurrency, 'price' => $request->price]
        );
        return back();
    }

    public function EditDataCurrency(Request $request)
    {
        DB::table("datasetcoins")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }
}
