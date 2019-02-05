<?php

namespace App\Http\Controllers\User;

use App\Icat;
use App\Iseries;
use App\Istep;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    public function index(){
        $table = Icat::orderBy('icatID', 'DESC')->get();
        return view('user.information.information')->with(['table' => $table]);
    }

    public function allInformation(){
        $table = Iseries::orderBy('name', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['iserieID'] = $row->iserieID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['stateID'] = $row->stateID;
            $rowData['cityID'] = $row->cityID;
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }

        return response()->json($data);
    }

    public function indexInformation(){
        $table = Iseries::orderBy('name', 'ASC')->take(2)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['iserieID'] = $row->iserieID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['stateID'] = $row->stateID;
            $rowData['cityID'] = $row->cityID;
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }

        return response()->json($data);
    }

    public function icatList($id){
        $table = Iseries::where('icatID',$id)->orderBy('name', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['iserieID'] = $row->iserieID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['stateID'] = $row->stateID;
            $rowData['cityID'] = $row->cityID;
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }
    public function isubcatList($id){
        $table = Iseries::where('isubcatID',$id)->orderBy('name', 'ASC')->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['iserieID'] = $row->iserieID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['stateID'] = $row->stateID;
            $rowData['cityID'] = $row->cityID;
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }
    public function informationSearch(Request $request){
        $search = $request->search;
        $table = Iseries::orderBy('name','ASC')->search($search)->get();
        $data=[];
        foreach ($table as $row){
            $rowData['name'] = $row->name;
            $rowData['iserieID'] = $row->iserieID;
            $rowData['description'] = $row->description;
            $rowData['tag'] = $row->tag;
            $rowData['imgName'] = $row->imgName;
            $rowData['icatID'] = $row->icat['name'];
            $rowData['isubcatID'] = $row->isubcat['name'];
            $rowData['stateID'] = $row->stateID;
            $rowData['cityID'] = $row->cityID;
            $rowData['userID'] = $row->user['name'];
            $rowData['created_at'] = $row->created_at->diffForHumans();
            $data[] = $rowData;
        }
        return response()->json($data);
    }

    public function informationDetails(Request $request){
        $table = Iseries::find($request->id);
        $istep = Istep::where('iserieID',$request->id)->orderBy('istepID', 'ASC')->get();
        return view('user.information.informationDetails')->with(['table' => $table,'istep' => $istep]);
    }

}
