<?php

namespace App\Http\Controllers\Blog;

use App\Blog;
use App\Breact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BreactController extends Controller
{
    public function index(){
        $table =Breact::orderBy('breactID', 'DESC')->get();
        $blog = Blog::orderBy('blogID', 'DESC')->get();
        return view('store.sCat')->with(['table' => $table,'blog'=>$blog]);
    }
    public function save(Request $request){
        $table = new Breact();
        $table->like = $request->like;
        $table->dislike = $request->dislike;
        $table->love = $request->love;
        $table->blogID = $request->blogID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Breact::find($request->id);
        $table->like = $request->like;
        $table->dislike = $request->dislike;
        $table->love = $request->love;
        $table->blogID = $request->blogID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Breact::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
