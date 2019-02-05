<?php

namespace App\Http\Controllers\Store;

use App\Scat;
use App\Ssubcat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SsubcatController extends Controller
{
    public function index(){
        $table = Ssubcat::orderBy('ssubcatID', 'DESC')->get();
        $scat = Scat::orderBy('scatID', 'DESC')->get();
        return view('admin.store.subcategory.ssubcat')->with(['table' => $table,'scat'=>$scat]);
    }
    public function save(Request $request){
        $table = new Ssubcat();
        $table->name = $request->name;
        $table->icon = $request->icon;
        $table->scatID = $request->scatID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Ssubcat::find($request->id);
        $table->name = $request->name;
        $table->icon = $request->icon;
        $table->scatID = $request->scatID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Ssubcat::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
