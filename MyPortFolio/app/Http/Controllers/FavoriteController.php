<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Favorite;
use App\Shop;

class FavoriteController extends Controller
{
    public function favorite($shopId) {
        $user_id = auth()->user()->id;

        Favorite::create([
            'shop_id' => $shopId,
            'user_id' => $user_id
        ]);

        return redirect()->back();
    }

    public function unfavorite($shopId) {
        $user_id = auth()->user()->id;

        $favorite = Favorite::where('shop_id',$shopId)->where('user_id',$user_id)->first();
        $favorite->delete();

        return redirect()->back();
    }
}

