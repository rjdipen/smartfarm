<?php

namespace App\Http\Controllers\Blog;

use App\Bcat;
use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        $table =Blog::orderBy('blogID', 'DESC')->get();
        return view('admin.blog.blog.blog')->with(['table' => $table]);
    }

    public function create(){
        $bcat =Bcat::orderBy('bcatID', 'DESC')->get();
        return view('admin.blog.blog.create')->with(['bcat' => $bcat]);
    }
    public function update($id){
        $table = Blog::find($id);
        $bcat =Bcat::orderBy('bcatID', 'DESC')->get();
        return view('admin.blog.blog.editBlog')->with(['table' => $table,'bcat' => $bcat]);
    }
    public function save(Request $request){
        $table = new Blog();
        $table->title = $request->title;
        $table->imgName = $request->imgName;
        $table->description = $request->description;
        $table->tag = $request->tag;
        $table->bcatID = $request->bcatID;
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
        $table= Blog::find($request->id);
        $table->title = $request->title;
        $table->imgName = $request->imgName;
        $table->description = $request->description;
        $table->tag = $request->tag;
        $table->bcatID = $request->bcatID;
        if ($request->hasFile('imgName')) {
            $extnshon = $request->imgName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;
            $table->imgName = $filename;
            $request->imgName->move('public/image/information/iseries',$filename);
        }
        $table->save();
        return redirect('blog/list')->with(config('custom.save'));
    }
    public function del($id){
        $table = Blog::find($id);
        $table->delete();
        return redirect()->back()->with(config('custom.del'));
    }
}
