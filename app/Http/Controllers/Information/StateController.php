<?php

namespace App\Http\Controllers\Information;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index(){
        $table = State::orderBy('stateID', 'DESC')->get();
        return view('admin.information.state.state')->with(['table' => $table]);
    }
    public function save(Request $request){
        $table = new State();
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= State::find($request->id);
        $table->name = $request->name;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = State::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
