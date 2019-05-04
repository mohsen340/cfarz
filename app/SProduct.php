<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SProduct extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'image_url', 'description', 'price'];
}
