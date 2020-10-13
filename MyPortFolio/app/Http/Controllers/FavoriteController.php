<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Favorite;
use App\Shop;

class FavoriteController extends Controller
{
    // public function store(Request $request, $shopId)
    // {
    //     favorite::create(
    //         array(
    //             'user_id' => Auth::user()->id,
    //             'shop_id' => $shopId
    //         )
    //     );

    //     $shop = Shop::findOrFail($shopId);

    //     return redirect()
    //         ->action('ShopController@show', $shop->id);
    // }

    // public function destroy($shopId, $favoriteId)
    // {
    //     $shop = Shop::findOrFail($shopId);
    //     $shop->like_by()->findOrFail($favoriteId)->delete();

    //     return redirect()
    //         ->action('ShopController@show', $shop->id);
    // }
}
