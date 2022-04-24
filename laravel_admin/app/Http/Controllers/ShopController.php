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

    public function edit($id){

        if(!ctype_digit($id)){
            return redirect('/list')->with('flash_message',__('Invalid operation was performed'));
        }

        $shop = DB::table('shops')->where('id',$id)->first();

        return view('edit',compact('shop'));

    }

    public function update(Request $request, $id ){
        if(!ctype_digit($id)){
            return redirect('/list')->with('flash_message',__('Invalid operation was performed'));
        }

        $shop = Shop::query()->where('id', $id)->first();
        $shop->fill($request->all())->save();

        return redirect('/list')->with('flash_message',__('Updated'));

    }

    public function delete($id){
        if(!ctype_digit($id)){
            return redirect('/list')->with('flash_message',__('Invalid operation was performed'));
        }

        $shop = Shop::query()->where('id', $id)->first();
        $shop->delete();

        return redirect('/list')->with('flash_message',__('Deleted'));
    }

    public function search(Request $request){

        $shop_name = $request->shop_name;
        $shop_pref = $request->shop_pref;
        $shop_city = $request->shop_city;
        $nearest_station = $request->nearest_station;

        $query = Shop::query();

        if(isset($shop_name)){
            $query->where('shop_name','like','%'.$shop_name.'%');
        }

        if(isset($shop_pref)){
            $query->where('shop_pref','like','%'.$shop_pref.'%');
        }

        if(isset($shop_city)){
            $query->where('shop_city','like','%'.$shop_city.'%');
        }

        if(isset($nearest_station)){
            $query->where('nearest_station','like','%'.$nearest_station.'%');
        }

        $shops = $query->get();
        return view('result' , ['shops'=>$shops]);
    }

    public function detail($id){

        if(!ctype_digit($id)){
            return redirect('/list')->with('flash_message',__('Invalid operation was performed'));
        }

        $shop = DB::table('shops')->where('id',$id)->first();

        return view('detail',compact('shop'));

    }


}
