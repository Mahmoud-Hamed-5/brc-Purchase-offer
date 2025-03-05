<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferResult extends Model
{
    protected $fillable = [
        'offer_number',
        'title',
        'publish_status',
        'file',

    ];
}
