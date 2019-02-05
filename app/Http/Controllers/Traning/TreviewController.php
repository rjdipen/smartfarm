<?php

namespace App\Http\Controllers\Traning;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TreviewController extends Controller
{
    public function index(){
        $table =Treview::orderBy('treviewID', 'DESC')->get();
        $tseries = Tseries::orderBy('tseriesID', 'DESC')->get();
        return view('store.sCat')->with(['table' => $table,'tseries'=>$tseries]);
    }
    public function save(Request $request){
        $table = new Treview();
        $table->comment = $request->comment;
        $table->tseriesID = $request->tseriesID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= Treview::find($request->id);
        $table->comment = $request->comment;
        $table->tseriesID = $request->tseriesID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = Treview::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
