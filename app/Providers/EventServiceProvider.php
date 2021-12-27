<?php

namespace App\Providers;

use App\Billing;
use App\BillName;
use App\Booking;
use App\Branch;
use App\Cashbook;
use App\Companies;
use App\InExp;
use App\Ranter;
use App\Seat;
use App\SeatType;
use App\SwapLog;
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

        //######################--Start--#############################
        Ranter::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });

        Ranter::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });
        //#######################--End--############################


        //######################--Start--#############################
        Cashbook::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });

        Cashbook::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });
        //#######################--End--############################


        //######################--Start--#############################
        Branch::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });

        Branch::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });
        //#######################--End--############################


        //######################--Start--#############################
        Seat::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });

        Seat::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });
        //#######################--End--############################


        //######################--Start--#############################
        SeatType::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });

        SeatType::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });
        //#######################--End--############################


        //######################--Start--#############################
        Booking::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });

        Booking::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $productCode = (!Auth::guest()) ? Auth::user()->productCode : null ;
            $model->userID = $userid;
            $model->productCode = $productCode;
        });
        //#######################--End--############################

        //######################--Start--#############################
        BillName::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        BillName::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //#######################--End--############################

        //######################--Start--#############################
        Billing::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Billing::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //#######################--End--############################

        //######################--Start--#############################
        InExp::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        InExp::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //#######################--End--############################

        //######################--Start--#############################
        SwapLog::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        SwapLog::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //#######################--End--############################


        //######################--Start--#############################
        Companies::creating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });

        Companies::updating(function($model)
        {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
            $model->userID = $userid;
        });
        //#######################--End--############################

    }
}
