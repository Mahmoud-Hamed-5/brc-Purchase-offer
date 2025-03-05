<?php

namespace App\Http\Controllers\Web\Purchase;

use App\Http\Controllers\Controller;
use App\Models\OfferResult;
use App\Models\PurchaseOffer;
use Illuminate\Http\Request;

class Web_PurchaseController extends Controller
{

    public function __construct()
    {
    }


    public function purchase_offers_index(Request $request)
    {
        $purchase_offers = PurchaseOffer::where('publish_status', 1)->get();

        return view('purchase-offers.purchase-offers_index', compact('purchase_offers'));

    }


    public function offers_results_index(Request $request)
    {
        $offers_results = OfferResult::where('publish_status', 1)->get();

        return view('purchase-offers.offers-results_index', compact('offers_results'));

    }

}
