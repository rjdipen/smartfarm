<?php

namespace App\Http\Controllers\Blog;

use App\Bcat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class BcatController extends Controller
{

    public function index(){
        $table =Bcat::orderBy('bcatID', 'DESC')->get();
        return view('admin.blog.category.bcat')->with(['table' => $table]);
    }
    public function save(Request $request){
        $table = new Bcat();
        $table->name = $request->name;
        $table->icon = $request->icon;
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Bcat::find($request->id);
        $table->name = $request->name;
        $table->icon = $request->icon;
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Bcat::find($id);
        $table->delete();
        return redirect()->back()->with(config('custom.del'));
    }

}
