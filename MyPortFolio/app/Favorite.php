<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  public function shop() {
    return $this->belongsTo('App\Shop');
  }
}
