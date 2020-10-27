<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorite extends Model
{
  protected $fillable = ['user_id', 'shop_id'];

  public function shop()
  {
    return $this->belongsTo(Shop::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}

