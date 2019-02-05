<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bcomment extends Model
{
    protected $table = 'bcomments';
    protected $primaryKey = 'bcommentID';
    protected $fillable = [
        'comment','blogID','userID'
    ];

    public function totalReply($id){
        $bcomments = Breply::where('bcommentID', $id)->count('replyCmd');
        return $bcomments;
    }
    public function breply()
    {
        return $this->hasMany('App\Breply', 'bcommentID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blogID');
    }
}
