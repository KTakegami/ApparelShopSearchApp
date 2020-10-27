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
        $id = auth()->user()->id; //ログインユーザのidを取得
        $favorites = array(); //空の配列を定義

        foreach ($this->favorites as $favorite) {
            array_push($favorites, $favorite->user_id);
        }

        if (in_array($id, $favorites)) {
            //in_array ($検索する値 , $配列) favoritesの中にuser_idが存在するか判定
            return true;
        } else {
            return false;
        }
        return Favorite::where('user_id', Auth::user()->id)->first();
    }
}
