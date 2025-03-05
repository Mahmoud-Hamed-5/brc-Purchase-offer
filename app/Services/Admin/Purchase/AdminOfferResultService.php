<?php
namespace App\Services\Admin\Purchase;

use App\Models\Admin;
use App\Models\OfferResult;
use App\Models\PurchaseOffer;
use App\Services\Common\MediaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;


class AdminOfferResultService
{

    protected $destinationPath = "storage/offers-results/";

    public function get_offers_results()
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];

        $offers_results = OfferResult::get();

        $data = [
            'offers_results' => $offers_results,
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


    public function create_offer_result($input_data)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];


        $offer_number = $input_data['offerNumber'];
        $title = $input_data['title'];

        $publish_status = isset($input_data['publishStatus']) ?? false;

        $file_path = '';
        if (isset($input_data['file'])) {
            $file = $input_data['file'];

            $path = $this->destinationPath;
            $file_path = (new MediaService)->save_file($file, $path);
        }

        $offer_result = OfferResult::create([
            'offer_number' => $offer_number,
            'title' => $title,
            'publish_status' => $publish_status,
            'file' => $file_path,
        ]);


        $msg = "تم اضافة البيانات بنجاح";
        $status_code = 200;


        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;

    }


    public function edit_offer_result($input_data, OfferResult $offer_result)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];


        if (isset($input_data['file'])) {
            $file = $input_data['file'];
            File::delete($offer_result->file);

            $path = $this->destinationPath;
            $file_path = (new MediaService)->save_file($file, $path);

            $offer_result->file = $file_path;
        }

        if (isset($input_data['offerNumber']))
            $offer_result->offer_number = $input_data['offerNumber'];

        if (isset($input_data['title']))
            $offer_result->title = $input_data['title'];

        $offer_result->publish_status = isset($input_data['publishStatus']) ?? false;

        $offer_result->save();

        $msg = "تم تعديل البيانات بنجاح";
        $status_code = 200;


        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;

    }


    public function delete_offer_result(OfferResult $offer_result)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];


        File::delete($offer_result->file);

        $offer_result->delete();

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

