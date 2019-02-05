<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model
{
    protected $table = 'temp_orders';
    protected $primaryKey = 'temp_orderID';
    protected $fillable = [
        'qty','unit','price','cookieID','productID'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'productID');
    }

    public function scat()
    {
        return $this->belongsTo('App\Scat', 'userID');
    }
}
