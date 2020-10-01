<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  public function shop() {
    return $this->hasOne('App\Shop');
  }
}
