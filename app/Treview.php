<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treview extends Model
{
    protected $table = 'treviews';
    protected $primaryKey = 'treviewID';
    protected $fillable = [
        'comment','rating','tserieID', 'userID'
    ];
}
