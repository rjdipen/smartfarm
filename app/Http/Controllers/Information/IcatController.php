<?php

namespace App\Http\Controllers\Information;

use App\Icat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IcatController extends Controller
{
    public function index(){
        $table = Icat::orderBy('icatID', 'DESC')->get();
        return view('admin.information.category.icat')->with(['table' => $table]);
    }
    public function save(Request $request){
        $table = new Icat();
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Icat::find($request->id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Icat::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
