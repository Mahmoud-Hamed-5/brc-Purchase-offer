<?php
namespace App\Services\Admin\Tender;

use App\Models\Admin;
use App\Models\PurchaseOffer;
use App\Models\Tender;
use App\Models\TenderAttachment;
use App\Services\Common\MediaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;


class Admin_TenderService
{

    protected $destinationPath = "storage/tenders/";

    public function get_tenders($tender_type = null, $publish_status = null)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];

        $tenders = Tender::query();

        if ($tender_type) {
            $tenders = $tenders->where('tender_type', $tender_type);
        }

        if ($publish_status) {
            $tenders = $tenders->where('publish_status', $publish_status);
        }

        $tenders = $tenders->get();

        $tenders->map(function ($item, $key) {
            $item->bond_cost_text = number_format($item->bond_cost);
            $item->tender_cost_text = number_format($item->tender_cost);

            return $item;
        });

        $data = [
            'tenders' => $tenders,
        ];
        $status_code = 200;
        $msg = "تم استرداد كافة البيانات";


        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;


    }


    public function create_tender($input_data)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];


        $tender_number = $input_data['tenderNumber'];
        $tender_type = $input_data['tenderType'];
        $title = $input_data['tenderTitle'];
        $details = $input_data['tenderDetails'];
        $bond_cost = $input_data['bondCost'];
        $bond_currency = $input_data['bondCurrency'];
        $tender_cost = $input_data['tenderCost'];
        $tender_cost_currency = $input_data['tenderCurrency'];
        $publish_status = isset($input_data['publishStatus']) ?? false;
        $close_date = $input_data['closeDate'];

        $tender = Tender::create([
            'tender_number' => $tender_number,
            'tender_type' => $tender_type,
            'title' => $title,
            'details' => $details,
            'bond_cost' => $bond_cost,
            'bond_currency' => $bond_currency,

            'tender_cost' => $tender_cost,
            'tender_cost_currency' => $tender_cost_currency,
            'publish_status' => $publish_status,
            'close_date' => $close_date,
        ]);

        if (isset($input_data['attachments'])) {

            $path = $this->destinationPath;
            foreach ($input_data['attachments'] as $attachment) {
                $file_name = $attachment->getClientOriginalName();

                $file_path = (new MediaService)->save_file($attachment, $path);

                TenderAttachment::create([
                    'tender_id' => $tender->id,
                    'file_name' => $file_name,
                    'file_url' => $file_path,
                ]);
            }

        }

        $msg = "تم اضافة البيانات بنجاح";
        $status_code = 200;

        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;

    }


    public function edit_tender($input_data, Tender $tender)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];

        if (isset($input_data['files'])) {
            Log::error($input_data['files']);
        }

        if (isset($input_data['newFiles'])) {
            $path = $this->destinationPath;
            foreach ($input_data['newFiles'] as $new_file) {
                $file_name = $new_file->getClientOriginalName();

                $file_path = (new MediaService)->save_file($new_file, $path);

                TenderAttachment::create([
                    'tender_id' => $tender->id,
                    'file_name' => $file_name,
                    'file_url' => $file_path,
                ]);
            }
        }

        if (isset($input_data['tenderNumber']))
            $tender->tender_number = $input_data['tenderNumber'];

        if (isset($input_data['tenderType']))
            $tender->tender_type = $input_data['tenderType'];

        if (isset($input_data['tenderTitle']))
            $tender->title = $input_data['tenderTitle'];

        if (isset($input_data['tenderDetails']))
            $tender->details = $input_data['tenderDetails'];

        if (isset($input_data['bondCost']))
            $tender->bond_cost = $input_data['bondCost'];

        if (isset($input_data['bondCurrency']))
            $tender->bond_currency = $input_data['bondCurrency'];

        if (isset($input_data['tenderCost']))
            $tender->tender_cost = $input_data['tenderCost'];

        if (isset($input_data['tenderCurrency']))
            $tender->tender_cost_currency = $input_data['tenderCurrency'];

        if (isset($input_data['closeDate']))
            $tender->close_date = $input_data['closeDate'];

        $tender->publish_status = isset($input_data['publishStatus']) ?? false;

        $tender->save();

        $msg = "تم تعديل البيانات بنجاح";
        $status_code = 200;


        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;

    }


    public function delete_tender(Tender $tender)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];


        foreach ($tender->attachments as $attachment) {
            File::delete($attachment->file_url);
        }


        $tender->delete();

        $msg = "تم حذف البيانات بنجاح";
        $status_code = 200;


        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;

    }
}

