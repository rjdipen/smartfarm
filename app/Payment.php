<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'paymentID';
    protected $fillable = [
        'textID','cookieID','userID'
    ];

//    public function countReview($id){
//        $table = Product::where('userID', $id)->count();
//        return $table;
//    }

}
