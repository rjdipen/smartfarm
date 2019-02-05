<?php

namespace App\Http\Controllers\User;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function orderPrint(){
        return view('user.shop.orderprint');
    }

    public function gen_session(){
        if (!Cookie::get('unique_session')) {
            Cookie::queue('unique_session', md5(date('Y-m-d H:i:s')), 1400);
        }
        return 0;
    }

    public function remove_session(){

        if (Cookie::get('unique_session')) {
            Cookie::queue('unique_session', null, 0);
        }

        return redirect()->back();
    }
}
