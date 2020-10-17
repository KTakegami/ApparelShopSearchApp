<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    protected $fillable = ['shop_name', 'shop_description', 'shop_image'];
    //複数代入時に代入を許可する属性を配列で設定


    public function user()
    { //N:1
        return $this->belongsTo(User::class);
    }

    public function genre()
    { //1:1
        return $this->belongsTo('App\Genre');
    }

    public function prefecture()
    { //1:1
        return $this->belongsTo('App\Prefecture');
    }

    public function product()
    { //1:1
        return $this->belongsTo('App\Product');
    }

    public function favorites()
    { //1:N
        return $this->hasMany(Favorite::class, 'shop_id');
    }

    public function favorited_authUser()
    {
        return Favorite::where('user_id', Auth::user()->id)->first();
    }
}
