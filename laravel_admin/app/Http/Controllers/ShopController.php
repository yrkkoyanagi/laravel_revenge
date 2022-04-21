<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function insert(Request $request){

        return view('insert');

    }

    public function list(Request $request){
        $admin_id = Auth::user()->id;
        $shops = DB::table('shops')->where('create_user',$admin_id)->paginate(5);

        return view('list',['shops' => $shops]);

    }


    public function create(Request $request){
        $shop = new Shop();

        $model = $shop->fill([
            'shop_name'=> $request->shop_name,
            'shop_pref' => $request->shop_pref,
            'shop_city' => $request->shop_city,
            'nearest_station' => $request->nearest_station,
            'budget_min' => $request->budget_min,
            'budget_max' => $request->budget_max,
            'party' => 0,
            'small' => 0,
            'girls' => 0,
            'seafood' => 0,
            'brandcow' => 0,
            'localsake' => 0,
            'craftbeer' => 0
        ]);

        $shop->save();

        return redirect('admin')->with('flash_message','登録が完了しました！');

    }

    public function delete(Request $request){

            return view('insert');

    }
}
