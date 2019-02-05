<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';
    protected $primaryKey = 'deliveyID';
    protected $fillable = [
        'address','instruction','ddate','dtime','cookieID','userID'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
