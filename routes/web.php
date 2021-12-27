<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {
    //============== Dashboard ===============
    Route::get('/', 'Dashboard\DashboardController@index');
    Route::post('codex', 'Dashboard\DashboardController@codex');
    //============== /Dashboard ===============

    //============== Ranter ===============
    Route::get('ranter/new/{id?}', 'Ranter\NewRanterController@index');
    Route::post('ranter/new', 'Ranter\NewRanterController@save');
    Route::post('ranter/edi', 'Ranter\NewRanterController@edit');
    Route::get('ranter/del/{id}', 'Ranter\NewRanterController@del');


    Route::get('ranter/list', 'Ranter\RanterListController@index');
    Route::get('ranter/show/{id}', 'Ranter\RanterListController@show');
    Route::get('ranter/status/{id}', 'Ranter\RanterListController@status');
    //============== /Ranter ===============

    //============== Booking ===============
    Route::get('booking', 'Booking\BookingController@index');
    Route::post('booking', 'Booking\BookingController@booking');
    Route::post('booking/edit', 'Booking\BookingController@edit_booking');
    Route::get('booking/status/{id}', 'Booking\BookingController@sure_book');
    Route::get('booking/seats', 'Booking\SeatController@index');
    //============== /Booking ===============

    //============== Booked =================
    Route::get('booked', 'Booking\BookingController@booked');
    Route::get('booked/receipt/{id}', 'Booking\BookingController@money_receipt');
    Route::get('booking/cancel/{id}/{ranter}', 'Booking\BookingController@cancel_booking');
    //============== /Booked ================

    //============== Seat ===============
    Route::get('seat/new', 'Seat\SeatController@index');
    Route::post('seat/new/save', 'Seat\SeatController@save');
    Route::post('seat/new/edi', 'Seat\SeatController@edit');
    Route::get('seat/new/del/{id}', 'Seat\SeatController@del');
    Route::get('seat/new/disable/{id}', 'Seat\SeatController@disabled');

    Route::get('seat/types', 'Seat\SeatTypeController@index');
    Route::post('seat/save', 'Seat\SeatTypeController@save');
    Route::post('seat/edi', 'Seat\SeatTypeController@edit');
    Route::get('seat/del/{id}', 'Seat\SeatTypeController@del');
    //============== /Seat ===============

    //============== Branch ===============
    Route::get('branch', 'Branch\BranchController@index');
    Route::post('branch/save', 'Branch\BranchController@save');
    Route::post('branch/edi', 'Branch\BranchController@edit');
    Route::get('branch/del/{id}', 'Branch\BranchController@del');
    //============== /Branch ===============

    //============== Bill Name ===============
    Route::get('bill/bill_name', 'Billing\NewBillingController@index');
    Route::post('bill/bill_name/save', 'Billing\NewBillingController@save');
    Route::post('bill/bill_name/edi', 'Billing\NewBillingController@edit');
    Route::get('bill/bill_name/del/{id}', 'Billing\NewBillingController@del');

    Route::get('bill_name/del/{id}', 'Billing\NewBillingController@del');
    //============== /Bill Name ===============

    //============== Collection ===============
    Route::get('collection/new', 'Collections\CollectionListController@index');
    Route::post('collection/pay', 'Collections\CollectionListController@bill_collection');

    Route::get('collection/ledger', 'Collections\CollectionLedgerController@index');
    Route::post('collection/ledger/edit', 'Collections\CollectionLedgerController@edit');
    Route::get('collection/ledger/del/{id}', 'Collections\CollectionLedgerController@del');
    //============== /Collection ===============

    //============== Room Swap ===============
    Route::get('swap', 'Swap\SwapController@index');
    Route::post('swap', 'Swap\SwapController@swap');
    //============== /Room Swap ===============

    //============== Single Bill ===============
    Route::get('single_bill/{id}', 'Billing\NewBillingController@bill_list');
    Route::post('single/bill/generate', 'Billing\NewBillingController@bill_generate');
    Route::get('single/bill/del/{id}', 'Billing\NewBillingController@bill_del');
    Route::post('single/bill/edit', 'Billing\NewBillingController@bill_edit');
    Route::get('bill/slip/{id}', 'Billing\NewBillingController@bill_slip');
    //============== /Single Bill ===============

    //============== Billing List ===============
    Route::get('billing/list', 'Billing\BillingListController@index');
    Route::get('billing/invoice/{id}', 'Billing\BillingListController@biil_invoice');
    //============== /Billing List ==============

    //============== Income List ===============
    Route::get('income', 'Income\IncomeController@index');
    Route::post('income/save', 'Income\IncomeController@save');
    Route::post('income/edit', 'Income\IncomeController@edit');
    Route::get('income/del/{id}', 'Income\IncomeController@del');
    //============== /Billing List ==============


    //============== Expense List ===============
    Route::get('expense', 'Expense\ExpenseController@index');
    Route::post('expense', 'Expense\ExpenseController@save');
    Route::post('expense/edit', 'Expense\ExpenseController@edit');
    Route::get('expense/del/{id}', 'Expense\ExpenseController@del');
    //============== /Billing List ==============


    //==================== Company =======================
    Route::post('company/save', 'Company\CompanyController@save');
//==================== /Company =======================

    //============== Report =====================

    //=================== START INCOME REPORT=================
    Route::get('report/income', 'Report\Income\IncomeController@index');
    Route::post('report/income/show', 'Report\Income\IncomeController@show');
    //=================== START INCOME REPORT=================

    //=================== START EXPENSE REPORT=================
    Route::get('report/expense', 'Report\Expense\ExpenseController@index');
    Route::post('report/expense/show', 'Report\Expense\ExpenseController@show');
    //=================== END EXPENSE REPORT===================

    //=================== START COLLECTION REPORT=================
    Route::get('report/collection', 'Report\Collection\CollectionController@index');
    Route::post('report/collection/show', 'Report\Collection\CollectionController@daily_Report');
    Route::post('report/collection/single', 'Report\Collection\CollectionController@ranter_wise');

    Route::post('report/due', 'Report\Collection\CollectionController@due');
    //=================== END COLLECTION REPORT===================

    Route::get('report/overview', 'Report\OverviewController@index');
    Route::post('report/overview/balance', 'Report\OverviewController@balance');

    Route::get('report/ranter', 'Report\RanterController@index');
    Route::post('report/ranter', 'Report\RanterController@ending');
    //============== /Report ====================
});

//=============== Test Controller =======================
Route::get('test', 'TestController@index');
//=============== /Test Controller =======================


//==================== Toggle Sidebar =======================
Route::get('savestate', 'MainController@saveState');
//Route::get('key', 'MainController@key');
//==================== /Toggle Sidebar =======================

Route::get('/catch', function () {
    Artisan::call('config:cache');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/exp', function () {
    return view('errors.exp');
})->name('exp');

Route::get('/access', function () {
    return view('errors.access');
})->name('access');

Route::get('/welcome', function () {
    return view('welcome');
});
