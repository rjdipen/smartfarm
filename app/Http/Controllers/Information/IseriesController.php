<?php

namespace App\Http\Controllers\Information;

use App\City;
use App\Icat;
use App\Iseries;
use App\Istep;
use App\Isubcat;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IseriesController extends Controller
{
    public function index(){
        $table = Iseries::orderBy('iserieID', 'DESC')->get();
        $state =State::orderBy('stateID', 'DESC')->get();
        $city = City::orderBy('cityID', 'DESC')->get();
        $icat = Icat::orderBy('icatID', 'DESC')->get();
        $isubcat = Isubcat::orderBy('isubcatID', 'DESC')->get();
        return view('admin.information.series.iseries')->with(['table' => $table,'state'=>$state,'city'=>$city,'icat'=>$icat,'isubcat'=>$isubcat]);
    }
    public function save(Request $request){
        $table = new Iseries();
        $table->name = $request->name;
        $table->description = $request->description;
        $table->tag = $request->tag;
        $table->icatID = $request->icatID;
        $table->isubcatID = $request->isubcatID;
        $table->stateID = $request->stateID;
        $table->cityID = $request->cityID;

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
    public function edit(Request $request)
    {
        $table= Iseries::find($request->id);
        $table->name = $request->name;
        $table->description = $request->description;
        $table->tag = $request->tag;
        $table->icatID = $request->icatID;
        $table->isubcatID = $request->isubcatID;
        $table->stateID = $request->stateID;
        $table->cityID = $request->cityID;

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

    public function steps_list($id){
        $table = Iseries::find($id);
        $istep = Istep::where('iserieID',$id)->orderBy('istepID', 'ASC')->get();
        return view('admin.information.series.isteps')->with(['table' => $table,'istep'=>$istep]);
    }

    public function del($id){
        $table = Iseries::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }

    public function category_list(Request $request){
        $table = Isubcat::where('icatID',$request->icatID)->get();
        return response()->json($table);
    }
    public function state_list(Request $request){
        $table = City::where('stateID',$request->stateID)->get();
        return response()->json($table);
    }


}
