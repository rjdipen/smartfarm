<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tseries extends Model
{
    protected $table = 'tseries';
    protected $primaryKey = 'tserieID';
    protected $fillable = [
        'title','authorName','imgName','description','tag','icatID','isubcatID', 'userID'
    ];

    public function scopeSearch($query, $search){
        return $query->where('title','like','%'.$search.'%')
            ->orWhere('authorName','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')
            ->orWhere('tag','like','%'.$search.'%');
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
