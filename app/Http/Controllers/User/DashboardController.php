<?php

namespace App\Http\Controllers\User;

use App\Aproduct;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index(){
        $value = Cookie::get('unique_session');
        $table = User::where('id', Auth::user()->id)->get();
        $order = Order::where('userID', Auth::user()->id)->where('cookieID', $value)->get();
        return view('user.dashboard.dashboard')->with(['table' => $table,'order'=>$order]);
    }

    public function profileUpdate(Request $request)
    {
//        dd($request->all());
        $table= User::find($request->id);
        $table->name = $request->name;
        $table->job = $request->job;
        $table->mobile = $request->mobile;
        $table->address = $request->address;
        if ($request->hasFile('imgName')) {
            $extnshon = $request->imgName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->imgName = $filename;
            $request->imgName->move('public/image/information/iseries/',$filename);
        }

        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }

}
