<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewAppDetail extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'google_play_link', 'is_google_play_download',
      'bazar_link', 'is_bazar_download', 'direct_link', 'is_direct_download',
      'auto_download', 'immediate_install'];
}
