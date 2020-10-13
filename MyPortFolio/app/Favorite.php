<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Favorite extends Model
{
  use CounterCache;
  
  public $counterCacheOptions = [
    'Shop' => ['field' => 'favorites_count', 'foreignKey' => 'shop_id']
  ];

  protected $fillable = ['user_id', 'shop_id'];

  public function Shop () {
    return $this->belongsTo('App\Shop');
  }
  
  public function User()
  {
    return $this->belongsTo(User::class);
  }
}
