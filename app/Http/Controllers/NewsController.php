<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddNewsPage()
    {
        $d = verta()->format('%d %B  %Y ');
        return view("pages/addnews")
            ->with('pagename','افزودن مقاله')
            ->with('pageaddress','/addnews')
            ->with('date',$d);
    }

    public function ShowNewsList()
    {
        $ourNews = DB::table('news')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/listnews")
            ->with('pagename','لیست مقاله')
            ->with('pageaddress','/listnews')
            ->with('date',$d)
            ->with('datasetList',$ourNews);
    }

    function CreateNews(Request $request)
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
        $image->move('images/news', $name);
        $data = 'images/news/'. $name;
      }

        DB::table('news')->insert(
            ['name' => $request->title, 'descrb' => $request->descrb, 'detail' => $request->text, 'status' => 1,'type' => $request->type,'filename'=>$data]
        );

        $ourNews = DB::table('news')->orderBy('created_at', 'desc')->paginate(100);
        $d = verta()->format('%d %B  %Y ');
        return view("pages/listnews")
            ->with('pagename','لیست مقاله')
            ->with('pageaddress','/listnews')
            ->with('date',$d)
            ->with('datasetList',$ourNews);

    }

    public function EditNews(Request $request)
    {
        DB::table("news")
            ->where('id',$request->id)
            ->update(array($request->column => $request->editval));
    }


    public function uploadImage(Request $request){
      $id = $request->id;
      $data = '';
      if($request->hasfile('image'))
      {
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $image->move('images/news', $name);
        $data = 'images/news/'. $name;
      }

//      $new = DB::table('news')->where('id', '=', $id)->first();
      DB::update("update news set filename = '$data' where id = '$id'");

      return back();
    }

}
