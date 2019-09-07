<?php

namespace App\Http\Controllers\Shop\Api;

use App\SProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationDataController extends Controller
{

  public function __construct() {
    $this->middleware('auth', ['only'=>['orders']]);
  }

  public function products($type){
    $products = SProduct::where('type', 'like', $type)->orderBy('id', 'desc')->get();
    return ws::r(1, $products);
  }

  public function product($id){
    $product = SProduct::find($id);
    if ($product !== null){
      return ws::r(1, $product);
    }else{
      return ws::r(0, '', 200, ms::NOT_FOUND_OBJECT);
    }
  }


  public function orders(){
    $user = Auth::user();
    $orders = $user->orders()->orderBy('id', 'desc')->get();
    foreach ($orders as $order){
      $order->product;
      $order->payment;
    }

    return ws::r(1, $orders);
  }


}
