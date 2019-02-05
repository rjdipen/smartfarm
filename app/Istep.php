<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Istep extends Model
{
    protected $table = 'isteps';
    protected $primaryKey = 'istepID';
    protected $fillable = [
        'title','description','imgName','iserieID','userID'
    ];
}
