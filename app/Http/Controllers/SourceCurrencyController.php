<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SourceCurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddCurrencyPageShow()
    {
        $ourCurrencys = DB::table('sourcecurrency')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addscurrency")
            ->with('pagename','مدیریت ارزها مرجع')
            ->with('pageaddress','/addscurrency')
            ->with('date',$d)
            ->with('currencyList',$ourCurrencys);
    }

    public function ListCurrencyShow()
    {
        $ourCurrencys = DB::table('sourcecurrency')->orderBy('created_at', 'desc')->paginate(100);
        $ourDatasetCurrencys = DB::table('datasetsourcecurrency')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/datascurrency")
            ->with('pagename','مدیریت دیتای ارزهای مرجع')
            ->with('pageaddress','/listscurrency')
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

//        $data = '';
      if($request->hasfile('filename'))
      {
        $image = $request->file('filename')[0];
        $name = $image->getClientOriginalName();
        $image->move('images/scurrency', $name);
        $data = 'images/scurrency/'. $name;
      }

        DB::table('sourcecurrency')->insert(
            ['name' => $request->name, 'inc_dec' => $request->inc, 'chart_show' => $request->chart, 'status' => $request->status,'filename'=>$data]
        );
        return back();

    }

    public function EditCurrency(Request $request)
    {
        DB::table("sourcecurrency")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    function CreateDataCurrency(Request $request)
    {
        DB::table('datasetsourcecurrency')->insert(
            ['sourcecurrency_id' => $request->idcurrency, 'price' => $request->price]
        );
        return back();
    }

    public function EditDataCurrency(Request $request)
    {
        DB::table("datasetsourcecurrency")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }
}
