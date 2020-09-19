<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Genre;
use App\Product;
use App\Prefecture;

class ShopController extends Controller
{
    public function create() {
        $user = auth()->user();
        return view ('shops.create');
    }

    // public function store(Request $request) {

    //     return redirect ('/home');
    // }
}
