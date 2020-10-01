<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['shop_name','shop_description','shop_image'];
    //複数代入時に代入を許可する属性を配列で設定


    public function users() { //N:1
        return $this->belongsTo('App\User');
    }
    public function genres() { //1:1
        return $this->hasOne('App\Genre');
    }

    public function prefectures() { //1:1
        return $this->hasOne('App\Prefecture');
    }

    public function products() { //1:1
        return $this->hasOne('App\Product');
    }

    public function favorites() { //1:N
        return $this->hasMany('App\Favorite');
    }

    public function getPrefName() {
        return config('prefectures'.$this->prefecture_id);
    }
}
