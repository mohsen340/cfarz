<?php

namespace App\Http\Controllers\Shop\Panel;

use App\SOrder;
use App\SProduct;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class PanelController extends Controller
{
    public function products(){
      $products = SProduct::orderBy('id', 'desc')->paginate(30);
      $d = verta()->format('%d %B  %Y ');
      return view('shop.products')
        ->with('pagename','مدیریت محصولات')
        ->with('pageaddress','/shop-products')
        ->with('date',$d)
        ->with('products',$products);
    }

    public function productDelete($id){
      $product = SProduct::find($id);
      $product->delete();
      return back();
    }

    public function detail($id){
      $product = SProduct::find($id);
      $d = verta()->format('%d %B  %Y ');
      return view('shop.product-detail')
        ->with('pagename','مدیریت محصولات')
        ->with('pageaddress','/shop-products/detail/'.$id)
        ->with('date',$d)
        ->with('product',$product);
    }

    public function update(Request $request){
      $product = SProduct::find($request->id);
      $data = null;
      if($request->hasfile('filename'))
      {
        $file = $request->file('filename')[0];
        $name = $file->getClientOriginalName();
        $random = mt_rand(10,100);
        $file->move('files/uploads/'.$random, $name);
        $data = 'files/uploads/'.$random .'/'. $name;
      }

      $product->type = $request->type;
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->priority = $request->priority;
      if($data != null) $product->image_url = URL::to('/') .'/'. $data;
      $product->save();

      return back();
    }

    public function productInsert(Request $request){
      $data = null;
      if($request->hasfile('filename'))
      {
        $file = $request->file('filename')[0];
        $name = $file->getClientOriginalName();
        $random = mt_rand(10,100);
        $file->move('files/uploads/'.$random, $name);
        $data = 'files/uploads/'.$random .'/'. $name;
      }

      $product = SProduct::create([
        'type' => $request->type,
        'title' => $request->title,
        'image_url' => URL::to('/') .'/'. $data,
        'description' => $request->description,
        'price' => $request->price,
        'priority' => $request->priority,
      ]);

      return back();

    }


  public function orders(){
    $orders = SOrder::orderBy('id', 'desc')->paginate(60);
    $d = verta()->format('%d %B  %Y ');
    return view('shop.orders')
      ->with('pagename','مدیریت سفارشات')
      ->with('pageaddress','/shop-orders')
      ->with('date',$d)
      ->with('orders',$orders);
  }

  public function orderDone($id){
      $order = SOrder::find($id);
      $order->is_done = 1;
      $order->save();
      return back();
  }


  public function users(){
    $users = User::whereNull('role')->orderBy('id', 'desc')->paginate(50);
    $d = verta()->format('%d %B  %Y ');
    return view('shop.users')
      ->with('pagename','مدیریت کاربران')
      ->with('pageaddress','/all-orders')
      ->with('date',$d)
      ->with('users',$users);
  }

  public function userDetail($id){
    $user = User::find($id);
    $orders = $user->orders()->orderBy('id', 'desc')->paginate(100);
    $d = verta()->format('%d %B  %Y ');
    return view('shop.userDetail')
      ->with('pagename','اطلاعات کاربر')
      ->with('pageaddress','/all-users')
      ->with('date',$d)
      ->with('user',$user)
      ->with('orders',$orders);
  }

}
