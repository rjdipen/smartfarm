<?php

namespace App\Http\Controllers\Information;

use App\Icat;
use App\Isubcat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IsubcatController extends Controller
{
    public function index(){
        $table = Isubcat::orderBy('isubcatID', 'DESC')->get();
        $icat = Icat::orderBy('icatID', 'DESC')->get();
        return view('admin.information.subcategory.isubcat')->with(['table' => $table,'icat'=>$icat]);
    }
    public function save(Request $request){
        $table = new Isubcat();
        $table->name = $request->name;
        $table->icatID = $request->icatID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Isubcat::find($request->id);
        $table->name = $request->name;
        $table->icatID = $request->icatID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Isubcat::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
