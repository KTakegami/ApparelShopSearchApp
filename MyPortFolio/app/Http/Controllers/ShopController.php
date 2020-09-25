<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Genre;
use App\Product;
use App\Prefecture;

class ShopController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        $shop = new Shop;
        $genre = new Genre;
        $product = new Product;
        $prefectures = new Prefecture;

        $shop->name = $request->name;
        $shop->description = $request->description;
        $genre->genre = $request->genre;
        $product->product = $request->product;
        $prefectures->prefectures = $request->prefectures;
        $shop->shop_image = $request->shop_image;
        
        $shop->users_id = $user->id;
        $shop->save();
        
        $genre->shops_id = $shop->shops_id;
        $product->shops_id = $shop->shops_id;
        $prefectures->shops_id = $shop->shops_id;
        
        $genre->save();
        $product->save();
        $prefectures->save();

        return redirect('/shops/create');
    }
}
