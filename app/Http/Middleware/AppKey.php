<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Shop\Api\ms;
use App\Http\Controllers\Shop\Api\ws;
use Closure;

class AppKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if($request->header('x-api-key') == ws::$authkey)
      {
        return $next($request);
      }else{
        return ws::r(0,'',200,ms::APP_KEY_ERROR);
      }

    }
}
