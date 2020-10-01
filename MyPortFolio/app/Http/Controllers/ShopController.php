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
        $shops = new Shop;

        return redirect ('/shops/create');


    }
}
