<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\OfferResult;
use App\Models\PurchaseOffer;
use App\Models\Tender;
use Illuminate\Http\Request;

class Web_HomeController extends Controller
{

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function get_news_data(Request $request)
    {
        $status_code = 200;
        $data = [];
        $msg = "";


        // 1. Offers Results
        $offers_results = OfferResult::where('publish_status', 1)
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        // 2. Purchase Offers
        $purchase_offers = PurchaseOffer::where('publish_status', 1)
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        // 3. Internal Tenders
        $internal_tenders = Tender::where('publish_status', 1)
            ->where('tender_type', Tender::TYPE_INTERNAL)
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        // 4. External Tenders
        $external_tenders = Tender::where('publish_status', 1)
            ->where('tender_type', Tender::TYPE_EXTERNAL)
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        $data = [
            'offers_results' => $offers_results,
            'purchase_offers' => $purchase_offers,
            'internal_tenders' => $internal_tenders,
            'external_tenders' => $external_tenders,
        ];

        $result = [
            'status_code' => $status_code,
            'msg' => $msg,
            'data' => $data,
        ];

        return $result;
    }
}
