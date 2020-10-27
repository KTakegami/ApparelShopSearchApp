<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Shop;
use App\User;
use App\Favorite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() /* [/home]へのアクセスを制限(ログイン後にアクセス可能) */
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user_id = $user->id;
        $query = Shop::query();

        $postShops = $query->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $favoriteShops = Favorite::leftjoin('shops','favorites.shop_id','=','shops.id')
        ->leftjoin('users','shops.user_id','=','users.id')
        ->where('favorites.user_id','=',$user_id)
        ->orderBy('shops.created_at', 'desc')
        ->get(); //ログインユーザがいいねしたショップ情報を取得

        $data = [
            'user' => $user,
            'postShops' => $postShops,
            'favoriteShops' => $favoriteShops
        ];

        return view('mypages.mypage', $data);
    }

    public function edit($id) {
        $user = User::findOrFail($id);

        return view('mypages.edit')->with('user',$user);
    }

    public function update(Request $req, $id) {
        $user = User::findOrFail($id);

        $req->validate([
            'name' => ['string', 'max:15'],
            'profImage' => 'image'
        ]);

        $user->name = $req->name;

        $user_image = $req->profImage;
        $filename = $user_image->getClientOriginalName(); //オリジナルのファイル名取得

        if ($user_image) {
            if (isset($user->profile_image)) {
                Storage::delete('public' . $user->profile_image); //public配下の画像を削除
                $path = $user_image->storeAs('public', $filename); //$fileNameで保存する
                $user->profile_image = str_replace('public', '', $path);
            } else {
                $path = $user_image->storeAs('public', $filename); //$fileNameで保存する
                $user->profile_image = str_replace('public', '', $path);
            }
        }

        $user->save();

        return back()->with('user',$user);
    }
}
