<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'cityID';
    protected $fillable = [
        'name','stateID','userID'
    ];

    public function istate()
    {
        return $this->belongsTo('App\State', 'stateID');
    }

    public function check($stateID,$cityID){
        $table = City::where('stateID', $stateID)->where('cityID', $cityID)->first();
        if($table == null){
            return false; //Customer bill Not found
        }else{
            return ['cityID' => $table->cityID, 'name' => $table->name];
        }
    }
}
