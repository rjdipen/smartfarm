<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'blogID';
    protected $fillable = [
        'title','imgName','description','tag','bcatID','userID'
    ];

    public function totalCmd($id){
        $table = Bcomment::where('blogID', $id)->count('comment');
        return $table;
    }

    public function scopeSearch($query, $search){
        return $query->where('title','like','%'.$search.'%')
            ->orWhere('tag','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%');
    }

    public function bcat()
    {
        return $this->hasMany('App\Bcat', 'blogID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
