<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breply extends Model
{
    protected $table = 'breplies';
    protected $primaryKey = 'breplieID';
    protected $fillable = [
        'replyCmd','bcommentID','userID'
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
    public function bComment()
    {
        return $this->belongsTo('App\Bcomment', 'bcommentID');
    }

}
