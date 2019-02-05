<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $primaryKey = 'stateID';
    protected $fillable = [
        'name','userID'
    ];
}
