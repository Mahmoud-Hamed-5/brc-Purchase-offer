<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tender extends Model
{

    use SoftDeletes;

    const TYPE_INTERNAL = 'internal';
    const TYPE_EXTERNAL = 'external';

    const CURRENCY_SYP = 'SYP';
    const CURRENCY_DOLLAR = 'USD';
    const CURRENCY_EURO = 'EUR';

    const CURRENCIES = [
        self::CURRENCY_SYP,
        self::CURRENCY_DOLLAR,
        self::CURRENCY_EURO,
    ];

    protected $fillable = [
        'tender_type',
        'tender_number',

        'title',
        'details',

        'bond_cost',
        'bond_currency',
        'bond_details',

        'tender_cost',
        'tender_cost_currency',
        'tender_cost_details',

        'close_date',

        'publish_status'
    ];


    /**
     * Get all of the attachments for the Tender
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(TenderAttachment::class, 'tender_id');
    }

}
