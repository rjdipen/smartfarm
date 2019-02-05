<?php

namespace App\Http\Controllers\Traning;

use App\Titems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TitemsController extends Controller
{
    public function index(){
        $table =Titems::orderBy('titemID', 'DESC')->get();
        return view('admin.training.series.tepisode')->with(['table' => $table]);
    }

    public function save(Request $request){
//        dd($request->all());
        $table = new Titems();
        $table->title = $request->title;
        $table->description = $request->description;
        $table->tserieID = $request->tserieID;

        if ($request->hasFile('imgName')) {
            $extnshon = $request->imgName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->imgName = $filename;
            $request->imgName->move('public/image/information/iseries',$filename);
        }
        if($request->hasFile('videoName')) {
            $extnshon = $request->videoName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->videoName = $filename;
            $request->videoName->move('public/video/episode',$filename);
        }
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }

    public function edit(Request $request)
    {
        $table= Titems::find($request->id);
        $table->title = $request->title;
        $table->description = $request->description;
        $table->tserieID = $request->tserieID;

        if ($request->hasFile('imgName')) {
            $extnshon = $request->imgName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->imgName = $filename;
            $request->imgName->move('public/image/information/iseries',$filename);
        }

        if ($request->hasFile('videoName')) {
            $extnshon = $request->videoName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->videoName = $filename;
            $request->videoName->move('public/video/episode',$filename);
        }
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }

    public function del($id){
        $table = Titems::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
