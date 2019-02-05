<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssubcat extends Model
{
    protected $table = 'ssubcats';
    protected $primaryKey = 'ssubcatID';
    protected $fillable = [
        'name','icon','scatID','userID'
    ];

    public function scat()
    {
        return $this->belongsTo('App\Scat', 'scatID');
    }
}
