<?php

namespace App\Http\Controllers\Information;

use App\City;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index(){
        $table =City::orderBy('cityID', 'DESC')->get();
        $state = State::orderBy('stateID', 'DESC')->get();
        return view('admin.information.city.city')->with(['table' => $table,'state'=>$state]);
    }
    public function save(Request $request){
        $table = new City();
        $table->name = $request->name;
        $table->stateID = $request->stateID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function edit(Request $request)
    {
        $table= City::find($request->id);
        $table->name = $request->name;
        $table->stateID = $request->stateID;
        $table->save();

        return redirect()->back()->with(config('custom.save'));
    }
    public function del($id){
        $table = City::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }
}
