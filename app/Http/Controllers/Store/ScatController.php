<?php

namespace App\Http\Controllers\Store;

use App\Scat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScatController extends Controller
{
    public function index(){
        $table = Scat::orderBy('scatID', 'DESC')->get();
        return view('admin.store.category.scat')->with(['table' => $table]);
    }
    public function save(Request $request){
        $table = new Scat();
        $table->name = $request->name;
        $table->icon = $request->icon;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Scat::find($request->id);
        $table->name = $request->name;
        $table->icon = $request->icon;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Scat::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
