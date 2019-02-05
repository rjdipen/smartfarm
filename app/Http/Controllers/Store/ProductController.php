<?php

namespace App\Http\Controllers\Store;

use App\Order;
use App\Product;
use App\Scat;
use App\Ssubcat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function index(){
        $table = Product::orderBy('productID', 'DESC')->get();
        $scat = Scat::orderBy('scatID', 'DESC')->get();
        $ssubcat = Ssubcat::orderBy('ssubcatID', 'DESC')->get();
        return view('admin.store.product.product')->with(['table' => $table,'scat' => $scat,'ssubcat' => $ssubcat]);
    }

    public function save(Request $request){
        $table = new Product();
        $table->name = $request->name;
        $table->scatID = $request->scatID;
        $table->ssubcatID = $request->ssubcatID;
        $table->price = $request->price;
        $table->unit = $request->unit;
        $table->qty = $request->qty;
        $table->status = 'Active';
        $table->description = $request->description;
        $table->tag = $request->tag;

        if ($request->hasFile('imgName')) {
            $extnshon = $request->imgName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->imgName = $filename;
            $request->imgName->move('public/image/information/iseries',$filename);
        }
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request){
        $table = Product::find($request->id);
        $table->name = $request->name;
        $table->scatID = $request->scatID;
        $table->ssubcatID = $request->ssubcatID;
        $table->price = $request->price;
        $table->unit = $request->unit;
        $table->qty = $request->qty;
        $table->status = 'Active';
        $table->description = $request->description;
        $table->tag = $request->tag;

        if ($request->hasFile('imgName')) {
            $extnshon = $request->imgName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->imgName = $filename;
            $request->imgName->move('public/image/information/iseries',$filename);
        }
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }

    public function del($id){
        $table = Product::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }

    public function subcat_list(Request $request){
        $table = Ssubcat::where('scatID',$request->scatID)->get();
        return response()->json($table);
    }

    public function orderList(){
        $table = Order::orderBy('orderID', 'DESC')->get();
        return view('admin.store.product.orderlist')->with(['table' => $table]);
    }

    public function orderdel($id){
        $table = Order::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }

    public function orderShip(Request $request)
    {
//        dd($request->all());
        $table= Order::find($request->id);
        $table->status = 'Shipping';
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }
}
