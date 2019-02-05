<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\TempOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DeliveryController extends Controller
{
    public function index(){
        return view('user.shop.checkout');//->with(['table' => $table]);
    }



    public function save(Request $request){
        $value = Cookie::get('unique_session');
        $check = Delivery::where('cookieID' ,$value)->first();
        if ($check != null){
            $table = Delivery::find($check->deliveyID);
            $table->address = $request->address;
            $table->instruction = $request->instruction;
            $table->ddate = $request->ddate;
            $table->dtime = $request->dtime;
            $table->save();
        }else{
            $table = new Delivery();
            $table->address = $request->address;
            $table->instruction = $request->instruction;
            $table->ddate = $request->ddate;
            $table->dtime = $request->dtime;
            $table->cookieID = $value;
            $table->save();
        }
        return redirect('shop/order/payment')->with(config('custom.save'));
    }
}
