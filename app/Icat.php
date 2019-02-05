<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icat extends Model
{
    protected $table = 'icats';
    protected $primaryKey = 'icatID';
    protected $fillable = [
        'name','userID'
    ];

    public function infoSubcat()
    {
        return $this->hasMany('App\Isubcat', 'icatID');
    }
}
