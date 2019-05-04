<?php

namespace App\Http\Controllers\Shop\Api;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Lcobucci\JWT\Parser;
//use DB;


class PassportController extends Controller
{

  public function __construct() {
//    $this->middleware('auth:api');
  }


  public function register(Request $request)
  {
    $data = $request->toArray();

    $validator1 = Validator::make($data, [
      'name' => 'required|max:50|min:1',
    ]);

    $validator2 = Validator::make($data, [
      'email' => 'required|email|unique:users'
    ]);
    $validator3 = Validator::make($data, [
      'password' => 'required|string|min:6'
    ]);


    if ($validator1->fails()) {
      return ws::r(0, '', Response::HTTP_OK , ms::REGISTER_NAME_ERROR);
    }elseif ($validator2->fails()){
      return ws::r(0, '', Response::HTTP_OK , ms::REGISTER_EMAIL_ERROR);
    }elseif ($validator3->fails()){
      return ws::r(0, '', Response::HTTP_OK , ms::REGISTER_PASSWORD_ERROR);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => null,
    ]);

    $token = $user->createToken($user->email)->accessToken;

    return ws::r(1,['token' => $token , 'user' => $user], Response::HTTP_OK,ms::REGISTER_SUCCESS);
  }


  public function login(Request $request)
  {
    $credentials = [
      'email' => $request->email,
      'password' => $request->password
    ];

    if (auth()->attempt($credentials)) {
      $token = auth()->user()->createToken($request->email)->accessToken;
      return ws::r(1, ['token' => $token, 'user' => Auth::user()], Response::HTTP_OK, ms::LOGIN_SUCCESS);
    } else {
      return ws::r(0,'', Response::HTTP_OK, ms::LOGIN_FAIL_ERROR);
    }
  }




  public function logout(Request $request){

    $value = $request->bearerToken();
    if ($value) {

      $id = (new Parser())->parse($value)->getHeader('jti');
      $revoked = DB::table('oauth_access_tokens')->where('id', '=', $id)->update(['revoked' => 1]);
//      auth()->guard()->logout();
    }
//    Auth::logout();
    return ws::r(1,'', Response::HTTP_OK, ms::LOGOUT_SUCCESS);


  }





  public function user()
  {
    if (Auth::user() !== null) {
      return ws::r(1, ['user' => auth()->user()], Response::HTTP_OK, '');
    }else{
      return ws::r(0, '', Response::HTTP_OK, ms::MUST_BE_LOGIN);
    }
  }




}
