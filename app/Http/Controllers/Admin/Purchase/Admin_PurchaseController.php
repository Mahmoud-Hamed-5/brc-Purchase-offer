<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Purchase\Admin_PurchaseOfferCreateRequest;
use App\Http\Requests\Admin\Purchase\Admin_PurchaseOfferEditRequest;
use App\Models\PurchaseOffer;
use App\Services\Admin\Purchase\Admin_PurchaseOfferService;
use Illuminate\Http\Request;

class Admin_PurchaseController extends Controller
{

    public function __construct(protected Admin_PurchaseOfferService $purchaseOffer_service)
    {
        // $this->middleware(['auth:dash', 'role:admin'])->except(['login','refresh']);
    }


    public function offers_index(Request $request)
    {
        $result = $this->purchaseOffer_service->get_purchase_offers();


        if ($result['status_code'] == 200) {
            $result_data = $result['data'];
            $purchase_offers = $result_data['purchase_offers'];

            return view('admin.purchase.purchase-offers_index', compact('purchase_offers'));
        }

       return redirect()->back()->withErrors($result['msg']);

    }


    public function create_offer(Request $request)
    {

        return view('admin.purchase.purchase-offer_create');
    }


    public function store_offer(Admin_PurchaseOfferCreateRequest $request)
    {

        $input_data = $request->validated();

        $result = $this->purchaseOffer_service->create_purchase_offer($input_data);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.purchase_offers.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }


    public function edit_offer(Admin_PurchaseOfferEditRequest $request, PurchaseOffer $purchase_offer)
    {

        $input_data = $request->validated();

        $result = $this->purchaseOffer_service->edit_purchase_offer($input_data, $purchase_offer);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.purchase_offers.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }


    public function delete_offer(Request $request, PurchaseOffer $purchase_offer)
    {

        $result = $this->purchaseOffer_service->delete_purchase_offer($purchase_offer);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.purchase_offers.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }

}
