<?php

namespace App\Http\Controllers\User;

use App\Icat;
use App\Titems;
use App\Tseries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    public function index(){
        $table = Icat::orderBy('icatID', 'DESC')->get();
        return view('user.training.training')->with(['table' => $table]);
    }

    public function allTseries(){
        $table = Tseries::orderBy('title', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['tserieID'] = $row->tserieID;
            $rowData['authorName'] = $row->authorName;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }

        return response()->json($data);
    }
    public function allindexTseries(){
        $table = Tseries::orderBy('title', 'ASC')->take(2)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['tserieID'] = $row->tserieID;
            $rowData['authorName'] = $row->authorName;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }

        return response()->json($data);
    }

    public function tcatList($id){
        $table = Tseries::where('icatID',$id)->orderBy('title', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['tserieID'] = $row->tserieID;
            $rowData['authorName'] = $row->authorName;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }
    public function tsubcatList($id){
        $table = Tseries::where('isubcatID',$id)->orderBy('title', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['tserieID'] = $row->tserieID;
            $rowData['authorName'] = $row->authorName;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }
    public function trainingSearch(Request $request){
        $search = $request->search;
        $table = Tseries::orderBy('title','ASC')->search($search)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['title'] = $row->title;
            $rowData['tserieID'] = $row->tserieID;
            $rowData['authorName'] = $row->authorName;
            $rowData['description'] = $row->description;
            $rowData['imgName'] = $row->imgName;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    public function trainingDetails(Request $request){
        $table = Tseries::find($request->id);
        $titems = Titems::where('tserieID',$request->id)->orderBy('titemID', 'ASC')->get();
        return view('user.training.trainingDetails')->with(['table' => $table,'titems' => $titems]);
    }


}
