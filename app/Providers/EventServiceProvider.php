<?php

namespace App\Providers;

use App\Bcat;
use App\Bcomment;
use App\Blog;
use App\Breact;
use App\Breply;
use App\City;
use App\Delivery;
use App\Icat;
use App\Iseries;
use App\Istep;
use App\Isubcat;
use App\Order;
use App\Payment;
use App\Preview;
use App\Product;
use App\Scat;
use App\Ssubcat;
use App\State;
use App\Titems;
use App\Treview;
use App\Tseries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //============== THIS IS FOR INFORMATION ===================
        Icat::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Icat::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Isubcat::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Isubcat::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        State::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        State::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        City::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        City::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Iseries::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Iseries::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Istep::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Istep::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        //============= THIS IS FOR STORE ==============
        Scat::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Scat::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Ssubcat::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Ssubcat::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Product::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Product::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Preview::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Preview::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        //========================= THIS IS FOR TRAINING =================

        Tseries::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Tseries::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Titems::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Titems::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Treview::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Treview::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        //========================= THIS IS FOR BLOG =================
        Bcat::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Bcat::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Bcomment::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Bcomment::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Blog::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Blog::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Breact::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Breact::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Breply::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Breply::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Delivery::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Delivery::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Payment::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Payment::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        Order::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Order::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
    }
}
