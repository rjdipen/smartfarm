<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preview extends Model
{
    protected $table = 'previews';
    protected $primaryKey = 'previewID';
    protected $fillable = [
        'comment','rating','productID','userID'
    ];

    public function countReview($id){
        $table = Product::where('userID', $id)->count();
        return $table;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
