<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Purchase\Admin_OfferResultCreateRequest;
use App\Http\Requests\Admin\Purchase\Admin_OfferResultEditRequest;
use App\Models\OfferResult;
use App\Models\PurchaseOffer;
use App\Services\Admin\Purchase\AdminOfferResultService;
use Illuminate\Http\Request;

class Admin_OfferResultController extends Controller
{

    public function __construct(protected AdminOfferResultService $offerResult_service)
    {
        // $this->middleware(['auth:dash', 'role:admin'])->except(['login','refresh']);
    }


    public function offers_results_index(Request $request)
    {
        $result = $this->offerResult_service->get_offers_results();


        if ($result['status_code'] == 200) {
            $result_data = $result['data'];
            $offers_results = $result_data['offers_results'];

            return view('admin.purchase.offers-results_index', compact('offers_results'));
        }

       return redirect()->back()->withErrors($result['msg']);

    }


    public function create_offer_result(Request $request)
    {

        return view('admin.purchase.offer-result_create');
    }


    public function store_offer_result(Admin_OfferResultCreateRequest $request)
    {

        $input_data = $request->validated();

        $result = $this->offerResult_service->create_offer_result($input_data);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.offers_results.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }


    public function edit_offer_result(Admin_OfferResultEditRequest $request, OfferResult $offer_result)
    {

        $input_data = $request->validated();

        $result = $this->offerResult_service->edit_offer_result($input_data, $offer_result);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.offers_results.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }


    public function delete_offer_result(Request $request, OfferResult $offer_result)
    {

        $result = $this->offerResult_service->delete_offer_result($offer_result);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.offers_results.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }

}
