<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breact extends Model
{
    protected $table = 'breacts';
    protected $primaryKey = 'breactID';
    protected $fillable = [
        'like','dislike','love','blogID','userID'
    ];
}
