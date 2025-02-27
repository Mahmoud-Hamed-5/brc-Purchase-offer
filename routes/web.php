<?php

use App\Http\Controllers\Admin\Admin_AuthController;
use App\Http\Controllers\Admin\Purchase\Admin_PurchaseController;
use App\Http\Controllers\Web\Purchase\Web_PurchaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::controller(Web_PurchaseController::class)->group(function () {
    Route::get('/purchase/view-purchase-offers', 'offers_index')->name('web.purchase_offers.index');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::controller(Admin_AuthController::class)->group(function () {
        Route::get('admin-lock', 'showLoginForm')->name('admin.auth.lock');

        Route::post('auth/login', 'login')->name('admin.auth.login');

        Route::post('auth/logout', 'logout')->name('admin.auth.logout');
    });

    Route::group(['middleware' => ['auth:admin', 'role:purchase_admin']], function () {

        Route::controller(Admin_PurchaseController::class)->group(function () {
            Route::get('/purchase/view-purchase-offers', 'offers_index')->name('admin.purchase_offers.index');

            Route::get('/purchase/create-purchase-offer', 'create_offer')->name('admin.purchase_offers.create_offer');
            Route::post('/purchase/store-purchase-offer', 'store_offer')->name('admin.purchase_offers.store_offer');

            Route::post('/purchase/edit-purchase-offer/{purchase_offer}', 'edit_offer')->name('admin.purchase_offers.edit_offer');


            Route::delete('/purchase/delete-purchase-offer/{purchase_offer}', 'delete_offer')->name('admin.purchase_offers.delete_offer');

        });

    });
});
