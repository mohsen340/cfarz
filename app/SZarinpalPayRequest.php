<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SZarinpalPayRequest extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'authority', 'user_id', 'product_id', 'price', 'phone', 'description'];
}
