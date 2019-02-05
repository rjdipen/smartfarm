<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iseries extends Model
{
    protected $table = 'iseries';
    protected $primaryKey = 'iserieID';
    protected $fillable = [
        'name','description','imgName','tag','icatID','isubcatID','stateID','cityID','userID'
    ];

    public function scopeSearch($query, $search){
        return $query->where('name','like','%'.$search.'%')
            ->orWhere('tag','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%');
    }

    public function icat()
    {
        return $this->belongsTo('App\Icat', 'icatID');
    }

    public function isubcat()
    {
        return $this->belongsTo('App\Isubcat', 'isubcatID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }


}
