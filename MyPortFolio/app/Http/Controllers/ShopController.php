<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Shop;

class ShopController extends Controller

{
    public function index(Request $request)
    {
        $user = auth()->user();
        $prefs = config('prefectures'); //都道府県の連想配列を取得
        $query = Shop::query(); //クエリを作成


        //絞り込み検索ここから//
        $shop_name = $request->shopName;
        $genre = $request->genre;
        $product = $request->product;
        $pref = $request->pref_code;
        
        if (isset($shop_name)) {
            $query->where('shop_name', 'like', '%' . $shop_name . '%');
        }
        if (isset($genre)) {
            $query->where('genre_id', $genre);
        }
        if (isset($product)) {
            $query->where('product_id', $pref);
        }
        if (isset($pref)) {
            $query->where('prefecture_id', $pref);
        }
        //ここまで

        $shops = $query->orderBy('created_at', 'desc')->paginate(5);
        //↑新しい順に上から表示

        return view('shops.index')->with('shops', $shops)->with('prefs', $prefs);
    }


    public function create(Request $request)
    {
        $user = auth()->user();
        $prefs = config('prefectures');
        return view('shops.create')->with(['prefs' => $prefs]);
    }

    public function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'shopName' => ['required','string', 'max:30'],
            'shop_description' => ['string', 'max:1000'],
            'genre' => 'required',
            'product' => 'required',
            'prefecture' => 'required',
            'shop_address' => ['unique:shops', 'string', 'max:100']
        ]);

        $shops = new Shop;
        $shops->user_id = $user->id;
        $shops->shop_name = $request->shopName;
        $shops->shop_description = $request->shop_description;
        $shops->genre_id = $request->genre;
        $shops->product_id = $request->product;
        $shops->prefecture_id = $request->pref_code;
        $shops->shop_address = $request->address;

        $shop_image = $request->shop_image;

        if($shop_image) { //画像投稿時public直下に画像を保存
            $filePath = $shop_image->store('public');
            $shops->shop_image = str_replace('public', '',$filePath);
        }

        $shops->save();


        return redirect('/shops');
    }
}
