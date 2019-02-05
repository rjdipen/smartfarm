<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isubcat extends Model
{
    protected $table = 'isubcats';
    protected $primaryKey = 'isubcatID';
    protected $fillable = [
        'name','icatID','userID'
    ];

    public function icat()
    {
        return $this->belongsTo('App\Icat', 'icatID');
    }
}
