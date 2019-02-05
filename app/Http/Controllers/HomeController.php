<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }


    public function allUser(){
        $table =User::orderBy('id', 'DESC')->get();
        return view('admin.user.user')->with(['table' => $table]);
    }
    public function makeAdmin(Request $request)
    {
//        dd($request->all());
        $table= User::find($request->id);
        $table->type = 'Admin';
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }

    public function makeUser(Request $request)
    {
        $table= User::find($request->id);
        $table->type = 'User';
        $table->save();
        return redirect()->back()->with(config('custom.save'));
    }

    public function del($id){
        $table = User::find($id);
        $table->delete();

        return redirect()->back()->with(config('custom.del'));
    }

    public function admin()
    {
        return view('admin');
    }
}
