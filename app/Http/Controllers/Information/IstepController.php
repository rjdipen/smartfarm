<?php

namespace App\Http\Controllers\Information;

use App\City;
use App\Icat;
use App\Iseries;
use App\Istep;
use App\Isubcat;
use App\State;
use App\Titems;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IstepController extends Controller
{
    public function index(){
        $table =Istep::orderBy('istepID', 'DESC')->get();
        return view('admin.information.series.istepsEdit')->with(['table' => $table]);
    }

    public function save(Request $request){
        $table = new Istep();
        $table->title = $request->title;
        $table->description = $request->description;
        $table->iserieID = $request->iserieID;

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

    public function update($id){

        $table =Istep::find($id);
//        $iseries = Iseries::get();
//        $billingSheet =BillingSheet::where('billingID', $id)->where('customerID', $id)->get();
        return view('admin.information.series.istepsEdit')->with(['table'=>$table]);
    }

    public function edit(Request $request)
    {
        $table= Istep::find($request->id);
        $table->title = $request->title;
        $table->description = $request->description;
        $table->iserieID = $request->iserieID;

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
}
