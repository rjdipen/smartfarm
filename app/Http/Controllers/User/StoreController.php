<?php

namespace App\Http\Controllers\User;

use App\Preview;
use App\Product;
use App\Scat;
use App\TempOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class StoreController extends Controller
{
    public function index(){
        $table = Scat::orderBy('name', 'ASC')->take(16)->get();
        return view('user.shop.shop')->with(['table' => $table]);
    }
    public function all_product(){
        $table = Product::orderBy('name', 'ASC')->take(16)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['productID'] = $row->productID;
            $rowData['qty'] = $row->qty;
            $rowData['unit'] = $row->unit;
            $rowData['price'] = $row->price;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['scatID'] = $row->scat['name'];
            $rowData['ssubcatID'] = $row->ssubcat['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    public function indexproduct(){
        $table = Product::orderBy('name', 'ASC')->take(4)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['qty'] = $row->qty;
            $rowData['unit'] = $row->unit;
            $rowData['price'] = $row->price;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['scatID'] = $row->scat['name'];
            $rowData['ssubcatID'] = $row->ssubcat['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    public function product($id){
        $table = Product::where('scatID',$id)->take(16)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['productID'] = $row->productID;
            $rowData['qty'] = $row->qty;
            $rowData['unit'] = $row->unit;
            $rowData['price'] = $row->price;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['scatID'] = $row->scat['name'];
            $rowData['ssubcatID'] = $row->ssubcat['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }
    public function product_subcat($id){
        $table = Product::where('ssubcatID',$id)->take(16)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['productID'] = $row->productID;
            $rowData['qty'] = $row->qty;
            $rowData['unit'] = $row->unit;
            $rowData['price'] = $row->price;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['scatID'] = $row->scat['name'];
            $rowData['ssubcatID'] = $row->ssubcat['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }
    public function product_search(Request $request){
        $search = $request->search;
        $table = Product::orderBy('name','ASC')->search($search)->take(16)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['productID'] = $row->productID;
            $rowData['qty'] = $row->qty;
            $rowData['unit'] = $row->unit;
            $rowData['price'] = $row->price;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['scatID'] = $row->scat['name'];
            $rowData['ssubcatID'] = $row->ssubcat['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    public function product_details(Request $request){
        $table = Product::find($request->id);
        $preview = Preview::where('productID',$request->id)->orderBy('previewID', 'ASC')->get();
        return view('user.shop.productDetails')->with(['table' => $table,'preview' => $preview]);
    }

    public function review(Request $request){
        $table = new Preview();
        $table->comment = $request->comment;
        $table->rating = $request->rating;
        $table->productID = $request->productID;
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }


    public function tempsave(Request $request){
        $value = Cookie::get('unique_session');
        $check = TempOrder::where('cookieID' ,$value)->where('productID',$request->productID)->first();
        if ($check != null){
            $table = TempOrder::find($check->temp_orderID);
            $old_qty =  $table->qty;
            $table->qty = $old_qty + 1;
            $table->save();
        }else{
            $table = new TempOrder();
            $table->qty = 1;
            $table->unit = $request->unit;
            $table->price = $request->price;
            $table->cookieID = $value;
            $table->productID = $request->productID;
            $table->save();
        }
        return 0;

    }


    public function temp_list(){
        $value = Cookie::get('unique_session');
        $table = TempOrder::where('cookieID', $value)->get();
        $amount = 0;
        $data = [];
        foreach ($table as $row){
            $rowData['product'] = '<tr>
                                        <td class="p-5">
                                            <p class="no-margin text-center"><a class="text-brown cart_plus_li" href="#" ><i class="icon-arrow-up5"></i></a></p>
                                            <p class="no-margin text-center">'.$row->qty.'</p>
                                            <p class="no-margin text-center"><a class="text-brown cart_minus_li" href="#"><i class="icon-arrow-down5"></i></a></p>
                                        </td>
                                        <td class="p-5"><img src="public/image/information/iseries/'.$row->product['imgName'].'" style="height:36px; width:36px;" alt="'.$row->product['name'].'"></td>
                                        <td class="p-5">
                                            <p class="no-margin text-light cart_tbl10">'.$row->product['name'].'</p>
                                            <p class="text-muted no-margin text-light cart_tbl10">'.money($row->price).'/'.$row->unit.'</p>
                                        </td class="p-5">
                                        <td class="p-5"><p class="no-margin text-light cart_tbl cart_tbl10">'.money($row->price * $row->qty).'</p></td>
                                        <td class="no-padding">
                                        <p class="no-margin text-light" title="Remove From List"><a class="text-purple remove_cart_li" href="#"><i class="icon-cross3"></i></a></p>
                                        </td>
                                   </tr>';

            $amount +=  $row->price;

            $data [] = $rowData;
        }

        return response()->json(['item' => count($table), 'table' =>$data, 'amount' =>  money($amount)]);

    }




}
