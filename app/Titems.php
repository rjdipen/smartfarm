<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titems extends Model
{
    protected $table = 'titems';
    protected $primaryKey = 'titemID';
    protected $fillable = [
        'title','description','imgName','videoName','tserieID', 'userID'
    ];
}
