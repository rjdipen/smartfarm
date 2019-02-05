<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scat extends Model
{
    protected $table = 'scats';
    protected $primaryKey = 'scatID';
    protected $fillable = [
        'name','icon','userID'
    ];
    public function s_subcat()
    {
        return $this->hasMany('App\Ssubcat', 'scatID');
    }
}
