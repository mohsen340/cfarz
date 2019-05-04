<?php

namespace App\Http\Controllers\Shop\Api;

use App\SOrder;
use App\SPayment;
use App\SProduct;
use App\SZarinpalPayRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Zarinpal\Drivers\SoapDriver;

class PaymentController extends Controller {
  public function productShop(Request $request) {
    $product_id = $request->product_id;
    $phone = $request->phone;
    $description = $request->description;
    $user_id = Auth::user()->id;

    $product = SProduct::find($product_id);
    if ($product == null) {
      return ws::r(0, '', 200, ms::NOT_EXIST_PRRODUCT);
    }

    $price = (int)$product->price;

    $zarinpal = new Zarinpal(env('MERCHANT_ID'), new SoapDriver());
    $req = SZarinpalPayRequest::create([
      'authority' => '',
      'user_id' => $user_id,
      'product_id' => $product_id,
      'price' => $price,
      'phone' => $phone,
      'description' => $description,
    ]);

    $req_id = $req->id;
    json_encode($answer = $zarinpal->request(
      route('product-shop-verify', ['request_id' => Crypt::encryptString($req_id)]),
      $price, 'buy product')
    );

    if (isset($answer['Authority'])) {
      $req->authority = $answer['Authority'];
      $req->save();

      $payment_url = $zarinpal->getStartPayAddress() . $answer['Authority'];
      return ws::r(1, $payment_url);
//      return redirect($zarinpal->getStartPayAddress() . $answer['Authority']);
    }

    return ws::r(0, '', 200, ms::INTERNAL_SERVER_ERROR);

  }


  public function productShopVerify($request_id) {
    $request_id = Crypt::decryptString($request_id);
    $req = SZarinpalPayRequest::find($request_id);
    $authority = $req->authority;
    $user_id = $req->user_id;
    $product_id = $req->product_id;
    $price = $req->price;
    $phone = $req->phone;
    $description = $req->description;

    $zarinpal = new Zarinpal(env('MERCHANT_ID'), new SoapDriver());
    $result = ($zarinpal->verify('OK', $price, $authority));
    //echo json_encode($result);
    $status = $result['Status'];

    if ($status == 'success') {
      $RefID = $result['RefID'];
      $payment = SPayment::create([
        'user_id' => $user_id,
        'amount' => $price,
        'receipt' => $RefID,
      ]);

      $order = SOrder::create([
        'user_id' => $user_id,
        's_product_id' => $product_id,
        's_payment_id' => $payment->id,
        'phone' => $phone,
        'description' => $description,
        'is_done' => 0,
        'buy_code' => '',
      ]);
      $buy_code = 1234 + 3 * ($order->id);
      $order->buy_code = $buy_code;
      $order->save();

      $description = ms::PAYMENT_SUCCESS;
      $RefID = $payment->receipt;

      return view('shop.paymentSuccess', compact(['description', 'price', 'RefID', 'buy_code']));


    } else {
      $description = ms::PAYMENT_FAILED;
      return view('shop.paymentFailed', compact('description'));
//        return ws::r(0, '', 200, ms::PAYMENT_FAILED);
    }


  }




}
