<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsPapersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddNewPaperCategoryPage()
    {
        $ourNews = DB::table('newspapercats')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/categorynewspaper")
            ->with('pagename','دسته بندی روزنامه')
            ->with('pageaddress','/addcatenewspaper')
            ->with('date',$d)
            ->with('currencyList',$ourNews);
    }

    function CreateNewsPaperCategory(Request $request)
    {
        DB::table('newspapercats')->insert(
            ['name' => $request->name]
        );
        return back();
    }

    public function EditNewsPaperCategory(Request $request)
    {
        DB::table("newspapercats")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }

    public function AddNewsPaperPage()
    {
        $ourNews = DB::table('newspapercats')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addnewspaper")
            ->with('pagename','افزودن روزنامه')
            ->with('pageaddress','/addnewspaper')
            ->with('date',$d)
            ->with('listnewscats',$ourNews);
    }

    public function ShowNewsPaperList()
    {
        $ourNews = DB::table('newspapers')->orderBy('created_at', 'desc')->paginate(100);
        $listnewpaper = DB::table('newspapercats')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/listnewspaper")
            ->with('pagename','لیست روزنامه ها')
            ->with('pageaddress','/listnewspaper')
            ->with('date',$d)
            ->with('listnewpaper',$listnewpaper)
            ->with('datasetList',$ourNews);
    }

    function CreateNewsPaper(Request $request)
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
        $image->move('images/newspaper', $name);
        $data = 'images/newspaper/'. $name;
      }

        DB::table('newspapers')->insert(
            ['title' => $request->title, 'descrb' => $request->descrb, 'download_link' => $request->downloadlink, 'cat_id' => $request->catid,'filename'=>$data]
        );

        $ourNews = DB::table('newspapers')->orderBy('created_at', 'desc')->paginate(100);
        $listnewpaper = DB::table('newspapercats')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/listnewspaper")
            ->with('pagename','لیست روزنامه ها')
            ->with('pageaddress','/listnewspaper')
            ->with('date',$d)
            ->with('listnewpaper',$listnewpaper)
            ->with('datasetList',$ourNews);

    }

    public function EditNewsPaper(Request $request)
    {
        DB::table("newspapers")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }


}
