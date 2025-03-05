<?php

use App\Http\Controllers\Admin\Admin_AuthController;
use App\Http\Controllers\Admin\Purchase\Admin_OfferResultController;
use App\Http\Controllers\Admin\Purchase\Admin_PurchaseController;
use App\Http\Controllers\Admin\Tender\Admin_TenderController;
use App\Http\Controllers\Web\Purchase\Web_PurchaseController;
use App\Http\Controllers\Web\Tender\Web_TenderController;
use App\Http\Controllers\Web\Web_HomeController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::controller(Web_HomeController::class)->group(function () {
    Route::get('/', 'index')->name('web.home.index');

    Route::get('/news-data', 'get_news_data')->name('web.home.get_news_data');
});

Route::controller(Web_PurchaseController::class)->group(function () {
    Route::get('/purchase/offers', 'purchase_offers_index')->name('web.purchase_offers.index');

    Route::get('/purchase/offers-results', 'offers_results_index')->name('web.offers_results.index');
});

Route::controller(Web_TenderController::class)->group(function () {
    Route::get('/tenders/tenders-ar', 'tenders_AR_index')->name('web.tenders.AR_index');
    Route::get('/tenders/tenders-en', 'tenders_EN_index')->name('web.tenders.EN_index');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'administration-dashboard/restricted'], function () {
    Route::controller(Admin_AuthController::class)->group(function () {
        Route::get('admin-lock', 'showLoginForm')->name('admin.auth.lock');

        Route::post('auth/login', 'login')->name('admin.auth.login');

        Route::post('auth/logout', 'logout')->name('admin.auth.logout');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::controller(Admin_AuthController::class)->group(function () {
            Route::get('index', 'dashboard')->name('admin.dashboard.index');
        });
    });

    Route::group(['middleware' => ['auth:admin', 'role:super_admin|purchase_admin']], function () {

        Route::controller(Admin_PurchaseController::class)->group(function () {
            Route::get('/purchase/view-purchase-offers', 'offers_index')->name('admin.purchase_offers.index');

            Route::get('/purchase/create-purchase-offer', 'create_offer')->name('admin.purchase_offers.create_offer');
            Route::post('/purchase/store-purchase-offer', 'store_offer')->name('admin.purchase_offers.store_offer');

            Route::post('/purchase/edit-purchase-offer/{purchase_offer}', 'edit_offer')->name('admin.purchase_offers.edit_offer');


            Route::delete('/purchase/delete-purchase-offer/{purchase_offer}', 'delete_offer')->name('admin.purchase_offers.delete_offer');

        });

        Route::controller(Admin_OfferResultController::class)->group(function () {
            Route::get('/offers-results/view-offers-results', 'offers_results_index')->name('admin.offers_results.index');

            Route::get('/offers-results/create-offer-result', 'create_offer_result')->name('admin.offers_results.create_offer_result');
            Route::post('/offers-results/store-offer-result', 'store_offer_result')->name('admin.offers_results.store_offer_result');

            Route::post('/offers-results/edit-offer-result/{offer_result}', 'edit_offer_result')->name('admin.offers_results.edit_offer_result');


            Route::delete('/offers-results/delete-offer-result/{offer_result}', 'delete_offer_result')->name('admin.offers_results.delete_offer_result');

        });

        Route::controller(Admin_TenderController::class)->group(function () {
            Route::get('/tenders/view-tenders', 'tenders_index')->name('admin.tenders.index');

            Route::get('/tenders/create-tender', 'create_tender')->name('admin.tenders.create_tender');
            Route::post('/tenders/store-tender', 'store_tender')->name('admin.tenders.store_tender');

            Route::post('/tenders/edit-tender/{tender}', 'edit_tender')->name('admin.tenders.edit_tender');


            Route::delete('/tenders/delete-tender/{tender}', 'delete_tender')->name('admin.tenders.delete_tender');

        });

    });

});
