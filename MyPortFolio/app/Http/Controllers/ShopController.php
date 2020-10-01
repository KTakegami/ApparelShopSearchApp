<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Shop;

class ShopController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $prefs = config('prefectures');
        return view('shops.create')->with(['prefs' => $prefs]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $shops = new Shop;
        $shops->user_id = $user->id;
        $shops->shop_name = $request->shop_name;
        $shops->shop_description = $request->shop_description;
        $shops->genre_id = $request->genre;
        $shops->product_id = $request->product;
        $shops->prefecture_id = $request->pref_code;
        $shops->shop_address = $request->address;
        $shops->shop_image = $request->shop_image;

        $shops->save();

        // logger()->debug('shop_name : ' . $request->shop_name);
        // logger()->debug('pref_code : ' . $request->pref_code);
        // logger()->debug('genre : ' . $request->genre);
        // logger()->debug('product : ' . $request->product);

        return redirect ('/shops/create');


    }
}
