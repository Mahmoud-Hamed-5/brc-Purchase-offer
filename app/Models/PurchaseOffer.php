<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOffer extends Model
{
    protected $fillable = [
        'offer_number',
        'material_type',
        'ad_date',
        'close_date',
        'publish_status',
        'file',
    ];


}
