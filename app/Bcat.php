<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bcat extends Model
{
    protected $table = 'bcats';
    protected $primaryKey = 'bcatID';
    protected $fillable = [
        'name','icon', 'userID'
    ];
}
