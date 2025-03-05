<?php

namespace App\Http\Requests\Admin\Tender;

use App\Models\Tender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Admin_TenderCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $allowed_types = [Tender::TYPE_EXTERNAL, Tender::TYPE_INTERNAL];
        $allowed_currencies = Tender::CURRENCIES;

        return [
            'tenderNumber' => ['required', 'string'],
            'tenderType' => ['required', Rule::in($allowed_types)],

            'tenderTitle' => ['required', 'string'],
            'tenderDetails' => ['required', 'string'],

            'bondCost' => ['required', 'numeric'],
            'bondCurrency' => ['required', Rule::in($allowed_currencies)],

            'tenderCost' => ['required', 'numeric'],
            'tenderCurrency' => ['required', Rule::in($allowed_currencies)],

            'publishStatus' => ['nullable'],

            'closeDate' => ['required', 'date'],
            'attachments' => ['required', 'array'],
            'attachments.*' => ['file', 'max:2048'],
        ];
    }
}
