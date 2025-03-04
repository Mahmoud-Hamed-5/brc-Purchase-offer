<?php

namespace App\Http\Controllers\Admin\Tender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tender\Admin_TenderCreateRequest;
use App\Http\Requests\Admin\Tender\Admin_TenderEditRequest;
use App\Models\Tender;
use App\Services\Admin\Tender\Admin_TenderService;
use Illuminate\Http\Request;

class Admin_TenderController extends Controller
{

    public function __construct(protected Admin_TenderService $tender_service)
    {
        // $this->middleware(['auth:dash', 'role:admin'])->except(['login','refresh']);
    }


    public function tenders_index(Request $request)
    {
        $tender_type = $request->tender_type;
        $publish_status = $request->publish_status;

        $result = $this->tender_service->get_tenders($tender_type, $publish_status);


        if ($result['status_code'] == 200) {
            $result_data = $result['data'];
            $tenders = $result_data['tenders'];

            return view('admin.tenders.tenders_index', compact('tenders'));
        }

       return redirect()->back()->withErrors($result['msg']);

    }


    public function create_tender(Request $request)
    {

        return view('admin.tenders.tender_create');
    }


    public function store_tender(Admin_TenderCreateRequest $request)
    {

        $input_data = $request->validated();

        $result = $this->tender_service->create_tender($input_data);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.tenders.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }


    public function edit_tender(Admin_TenderEditRequest $request, Tender $tender)
    {

        $input_data = $request->validated();

        $result = $this->tender_service->edit_tender($input_data, $tender);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.tenders.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }


    public function delete_tender(Request $request, Tender $tender)
    {

        $result = $this->tender_service->delete_tender($tender);

        if ($result['status_code'] == 200) {
            $result_data = $result['data'];

            return redirect()->route('admin.tenders.index')->withSuccess($result['msg']);
        }

       return redirect()->back()->withErrors($result['msg']);
    }

}
