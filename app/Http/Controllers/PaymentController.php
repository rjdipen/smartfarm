<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Order;
use App\Payment;
use App\TempOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(){
        $value = Cookie::get('unique_session');
        $table = TempOrder::where('cookieID', $value)->get();
        $delivery = Delivery::where('cookieID', $value)->get();
        return view('user.shop.orderpayment')->with(['table'=>$table,'delivery'=>$delivery]);
    }

    public function save(Request $request){
        $value = Cookie::get('unique_session');
        $check = Payment::where('cookieID' ,$value)->first();
        if ($check != null){
            $table = Payment::find($check->paymentID);
            $table->textID = $request->textID;
            $table->save();
        }else{
            $table = new Payment();
            $table->textID = $request->textID;
            $table->cookieID = $value;
            $table->save();
        }
        return redirect()->back()->with(config('custom.save'));

    }

    public function printOrder(){
        $value = Cookie::get('unique_session');
        $table = TempOrder::where('cookieID', $value)->get();
        $delivery = Delivery::where('cookieID', $value)->get();
        return view('user.shop.orderprint')->with(['table'=>$table,'delivery'=>$delivery]);
    }

    public function confirmOrder(){
        $value = Cookie::get('unique_session');

        $pay = Payment::where('cookieID', $value)->first();
        if($pay != null){
            DB::beginTransaction();
            try {

                $bill = TempOrder::where('cookieID' ,$value)->get();
                foreach ($bill as $row ){
                    //BillingSheet Table
                    $table = new Order();
                    $table->qty = $row->qty;
                    $table->unit = $row->unit;
                    $table->price = $row->price;
                    $table->status = 'Pending';
                    $table->cookieID = $row->cookieID;
                    $table->productID = $row->productID;
                    $table->save();
                    //BillingSheet Table
                }

                TempOrder::where('cookieID' ,$value)->delete();

                Cookie::queue('unique_session', md5(date('Y-m-d H:i:s')), 1400);

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }
            return redirect()->back()->with(config('naz.bill_generate'));
        }else{
            return redirect()->back();
        }

    }




}
