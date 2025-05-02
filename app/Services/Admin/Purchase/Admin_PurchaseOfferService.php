<?php
namespace App\Services\Admin\Purchase;

use App\Models\Admin;
use App\Models\PurchaseOffer;
use App\Services\Common\MediaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;


class Admin_PurchaseOfferService
{

    protected $destinationPath = "storage/purchase-offers/";

    public function get_purchase_offers()
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];

        $purchase_offers = PurchaseOffer::
        orderBy('created_at', 'desc')
        ->get();

        $data = [
            'purchase_offers' => $purchase_offers,
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


    public function create_purchase_offer($input_data)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];


        $offer_number = $input_data['offerNumber'];
        $material_type = $input_data['materialType'];
        $ad_date = $input_data['adDate'];
        $close_date = $input_data['closeDate'];
        $publish_status = isset($input_data['publishStatus']) ?? false;

        $file_path = '';
        if (isset($input_data['file'])) {
            $file = $input_data['file'];

            $path = $this->destinationPath;
            $file_path = (new MediaService)->save_file($file, $path);
        }


        $purchase_offer = PurchaseOffer::create([
            'offer_number' => $offer_number,
            'material_type' => $material_type,
            'ad_date' => $ad_date,
            'close_date' => $close_date,
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


    public function edit_purchase_offer($input_data, PurchaseOffer $purchase_offer)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];

        if (isset($input_data['file'])) {
            $file = $input_data['file'];
            File::delete($purchase_offer->file);

            $path = $this->destinationPath;
            $file_path = (new MediaService)->save_file($file, $path);

            $purchase_offer->file = $file_path;
        }

        if (isset($input_data['offerNumber']))
            $purchase_offer->offer_number = $input_data['offerNumber'];

        if (isset($input_data['materialType']))
            $purchase_offer->material_type = $input_data['materialType'];

        if (isset($input_data['adDate']))
            $purchase_offer->ad_date = $input_data['adDate'];

        if (isset($input_data['closeDate']))
            $purchase_offer->close_date = $input_data['closeDate'];

        $purchase_offer->publish_status = isset($input_data['publishStatus']) ?? false;

        $purchase_offer->save();

        $msg = "تم تعديل البيانات بنجاح";
        $status_code = 200;


        $result = [
            'data' => $data,
            'status_code' => $status_code,
            'msg' => $msg,
        ];

        return $result;

    }


    public function delete_purchase_offer(PurchaseOffer $purchase_offer)
    {
        $data = [];
        $status_code = 400;
        $msg = 'processing error';
        $result = [];


        File::delete($purchase_offer->file);

        $purchase_offer->delete();

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

