<?php

namespace App\Http\Controllers\Web\Purchase;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOffer;
use Illuminate\Http\Request;

class Web_PurchaseController extends Controller
{

    public function __construct()
    {
    }


    public function offers_index(Request $request)
    {
        $purchase_offers = PurchaseOffer::get();

        return view('purchase-offers.purchase-offers_index', compact('purchase_offers'));

    }


}
