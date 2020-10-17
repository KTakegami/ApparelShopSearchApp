<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $shops = $query->orderBy('created_at', 'desc')->simplePaginate(15);
        //↑新しい順に上から表示

        return view('shops.index')->with('shops', $shops)->with('prefs', $prefs);
    }


    public function create(Request $request)
    {
        $user = auth()->user();
        $prefs = config('prefectures');

        logger()->info($prefs);
        return view('shops.create',['prefs' => $prefs]);
    }

    public function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'shopName' => ['required','string', 'max:30'],
            'shop_description' => ['string', 'max:1000'],
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

        $filename = $shop_image->getClientOriginalName();
        //画像のオリジナル名を取得
        
        if($shop_image) { //画像投稿時public直下に画像を保存
            $path = $shop_image->storeAs('public', $filename); //$fileNameで保存する
            $shops->shop_image = str_replace('public', '',$path);
        }

        $shops->save();

        return redirect('/shops');
    }

    public function Show(Request $request, $id) {
        $user_id = Auth::id();
        $shop = Shop::findOrFail($id);

        return view('shops.show')->with('shop',$shop)->with('user_id',$user_id);
    }

    public function edit($id) {
        $shops = Shop::findOrFail($id);

        $prefs = config('prefectures');
        return view('shops.edit')->with('shops',$shops)->with('prefs', $prefs);
    }

    public function update(Request $request,$id) {
        $shops = Shop::findOrFail($id);
        $user = auth()->user();

        //ここから画像以外の処理
        $shops->user_id = $user->id;
        $shops->shop_name = $request->shopName;
        $shops->shop_description = $request->shop_description;
        $shops->genre_id = $request->genre;
        $shops->product_id = $request->product;
        $shops->prefecture_id = $request->pref_code;
        $shops->shop_address = $request->address;
        //ここまで画像以外の処理

        //ここから画像処理
        $shop_image = $request->shop_image;
        $filename = $shop_image->getClientOriginalName();

        if($shop_image) {
            if(isset($shops->shop_image)) {
                Storage::delete('public' . $shops->shop_image); //public配下の画像を削除
                $path = $shop_image->storeAs('public', $filename); //$fileNameで保存する
                $shops->shop_image = str_replace('public', '', $path);
            } else {
                $path = $shop_image->storeAs('public', $filename); //$fileNameで保存する
                $shops->shop_image = str_replace('public', '', $path);
            }
        }
        //ここまで画像処理

        $shops->save();

        return redirect('shops')->with('shops',$shops);
    }

    public function destroy($id) {

        $shops =  Shop::where('id',$id)->delete();
        return redirect('shops');
    }
}
