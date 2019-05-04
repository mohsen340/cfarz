<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SOrder extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 's_product_id', 's_payment_id', 'phone', 'description', 'buy_code'];


    public function payment(){
      return $this->belongsTo('App\SPayment', 's_payment_id');
    }

    public function product(){
      return $this->belongsTo('App\SProduct', 's_product_id')->withTrashed();
    }

    public function user(){
      return $this->belongsTo('App\User');
    }


}
