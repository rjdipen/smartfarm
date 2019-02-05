<?php

namespace App\Http\Controllers\User;

use App\Aproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    public function index(){
        $table = Aproduct::orderBy('aproductID', 'DESC')->get();
        return view('user.auction.auction')->with(['table' => $table]);
    }
}
