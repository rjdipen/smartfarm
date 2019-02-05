<?php

namespace App\Http\Controllers\User;

use App\Bcat;
use App\Bcomment;
use App\Blog;
use App\Breply;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        $table = Bcat::orderBy('name', 'ASC')->get();
        $blog = Blog::orderBy('blogID', 'DESC')->paginate(8);
        return view('user.blog.blog')->with(['table' => $table,'blog'=>$blog]);
    }

    public function allBlog(){
        $table = Blog::orderBy('title', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['blogID'] = $row->blogID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['bcatID'] = $row->bcatID;
            $rowData['userID'] = $row->user['name'];
            $table = $row;
            $rowData['totalCmd'] = $table->totalCmd($table->blogID);
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }

        return response()->json($data);
    }

    public function blogCat($id){
        $table = Blog::where('bcatID',$id)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['blogID'] = $row->blogID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['bcatID'] = $row->bcatID;
            $rowData['userID'] = $row->user['name'];
            $table = $row;
            $rowData['totalCmd'] = $table->totalCmd($table->blogID);
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    public function blogSearch(Request $request){
        $search = $request->search;
        $table = Blog::orderBy('title','ASC')->search($search)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['blogID'] = $row->blogID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['bcatID'] = $row->bcatID;
            $rowData['userID'] = $row->user['name'];
            $table = $row;
            $rowData['totalCmd'] = $table->totalCmd($table->blogID);
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    public function blogDetails(Request $request){
        $table = Blog::find($request->id);
        $bcat = Bcat::orderBy('name', 'ASC')->get();
        $bcomment = Bcomment::where('blogID',$request->id)->orderBy('bcommentID', 'DESC')->get();
        return view('user.blog.blogDetails')->with(['table' => $table,'bcomment' => $bcomment,'bcat'=>$bcat]);
    }

    public function blogCmd(Request $request){
        $table = new Bcomment();
        $table->comment = $request->comment;
        $table->blogID = $request->blogID;
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }

    public function blogCmdEdit(Request $request)
    {

        $table= Bcomment::find($request->id);
        $table->comment = $request->comment;
        $table->blogID = $request->blogID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function blogCmdDel($id){
        $table = Bcomment::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }

    public function blogReply(Request $request){
        $table = new Breply();
        $table->replyCmd = $request->replyCmd;
        $table->bcommentID = $request->bcommentID;
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }

    public function blogReplyEdit(Request $request)
    {
//        dd($request->all());
        $table= Breply::find($request->id);
        $table->replyCmd = $request->replyCmd;
        $table->bcommentID = $request->bcommentID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }

    public function blogReplyDel($id){
        $table = Breply::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }


    public function allBlogIndex(){
        $table = Blog::orderBy('title', 'ASC')->take(4)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['blogID'] = $row->blogID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['bcatID'] = $row->bcatID;
            $rowData['userID'] = $row->user['name'];
            $table = $row;
            $rowData['totalCmd'] = $table->totalCmd($table->blogID);
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }

        return response()->json($data);
    }


}
