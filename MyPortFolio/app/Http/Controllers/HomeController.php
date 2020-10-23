<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;

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

     public function mypage() {
        $user = auth()->user();

         return view('mypages.mypage')->with('user',$user);
     }
}
