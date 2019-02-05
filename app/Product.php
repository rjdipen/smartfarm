<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'productID';
    protected $fillable = [
        'name','qty','unit','price','imgName',
        'status','tag','description','scatID','ssubcatID', 'userID'
    ];

    public function totalUser($id){
        $table = Preview::where('productID', $id)->count('userID');
        return $table;
    }
    public function ratingTotal($id){
        $table = Preview::where('productID', $id)->sum('rating');
        return $table;
    }

    public function scopeSearch($query, $search){
        return $query->where('name','like','%'.$search.'%')
            ->orWhere('tag','like','%'.$search.'%')
            ->orWhere('unit','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }

    public function scat()
    {
        return $this->belongsTo('App\Scat', 'scatID');
    }

    public function ssubcat()
    {
        return $this->belongsTo('App\Ssubcat', 'ssubcatID');
    }
}
