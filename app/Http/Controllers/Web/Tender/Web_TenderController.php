<?php

namespace App\Http\Controllers\Web\Tender;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;

class Web_TenderController extends Controller
{

    public function __construct()
    {
    }


    public function tenders_AR_index(Request $request)
    {

        $tenders = Tender::where('publish_status', 1)
            ->where('tender_type', Tender::TYPE_INTERNAL)
            ->orderBy('created_at', 'DESC')
            ->get();

            $tenders->map(function ($item, $key) {
                switch ($item->bond_currency) {
                    case Tender::CURRENCY_SYP:
                        $bond_currency_text = 'ل.س';
                        break;

                    case Tender::CURRENCY_DOLLAR:
                        $bond_currency_text = 'دولار';
                        break;

                    case Tender::CURRENCY_EURO:
                        $bond_currency_text = 'يورو';
                        break;
                }
                $item->bond_currency_text = $bond_currency_text;

                switch ($item->tender_cost_currency) {
                    case Tender::CURRENCY_SYP:
                        $tender_cost_currency_text = 'ل.س';
                        break;

                    case Tender::CURRENCY_DOLLAR:
                        $tender_cost_currency_text = 'دولار';
                        break;

                    case Tender::CURRENCY_EURO:
                        $tender_cost_currency_text = 'يورو';
                        break;
                }
                $item->tender_cost_currency_text = $tender_cost_currency_text;

                $item->bond_cost_text = number_format($item->bond_cost);
                $item->tender_cost_text = number_format($item->tender_cost);

                return $item;
            });

        return view('tenders.tenders-AR_index', compact('tenders'));

    }


    public function tenders_EN_index(Request $request)
    {

        $tenders = Tender::where('publish_status', 1)
            ->where('tender_type', Tender::TYPE_EXTERNAL)
            ->orderBy('created_at', 'DESC')
            ->get();

            $tenders->map(function ($item, $key) {
                $item->bond_currency_text = $item->bond_currency;
                $item->tender_cost_currency_text = $item->tender_cost_currency;

                $item->bond_cost_text = number_format($item->bond_cost);
                $item->tender_cost_text = number_format($item->tender_cost);
                
                return $item;
            });

        return view('tenders.tenders-EN_index', compact('tenders'));

    }
}
