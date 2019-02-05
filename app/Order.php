<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'orderID';
    protected $fillable = [
        'qty','unit','price','status','cookieID','productID','userID'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'productID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
