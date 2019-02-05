<?php

namespace App\Http\Controllers\Traning;

use App\Icat;
use App\Isubcat;
use App\Titems;
use App\Tseries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TseriesController extends Controller
{
    public function index(){
        $table = Tseries::orderBy('tserieID', 'DESC')->get();
        $icat = Icat::orderBy('icatID', 'DESC')->get();
        $isubcat = Isubcat::orderBy('isubcatID', 'DESC')->get();
        return view('admin.training.series.tseries')->with(['table' => $table,'icat'=>$icat,'isubcat'=>$isubcat]);
    }
    public function save(Request $request){
        $table = new Tseries();
        $table->title = $request->title;
        $table->authorName = $request->authorName;
        $table->tag = $request->tag;
        $table->description = $request->description;
        $table->icatID = $request->icatID;
        $table->isubcatID = $request->isubcatID;
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
    public function edit(Request $request)
    {
        $table= Tseries::find($request->id);
        $table->title = $request->title;
        $table->authorName = $request->authorName;
        $table->tag = $request->tag;
        $table->description = $request->description;
        $table->icatID = $request->icatID;
        $table->isubcatID = $request->isubcatID;


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
        $table = Tseries::find($id);
        $episode = Titems::where('tserieID',$id)->orderBy('titemID', 'ASC')->get();
        return view('admin.training.series.tepisode')->with(['table' => $table,'episode'=>$episode]);
    }

    public function del($id){
        $table = Tseries::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }

    public function subcategory_list(Request $request){
        $table = Isubcat::where('icatID',$request->icatID)->get();
        return response()->json($table);
    }
}
