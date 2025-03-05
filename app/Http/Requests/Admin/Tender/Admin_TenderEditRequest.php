<?php

namespace App\Http\Requests\Admin\Tender;

use App\Models\Tender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Admin_TenderEditRequest extends FormRequest
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
            'tenderNumber' => ['nullable', 'string'],
            'tenderType' => ['nullable', Rule::in($allowed_types)],

            'tenderTitle' => ['nullable', 'string'],
            'tenderDetails' => ['nullable', 'string'],

            'bondCost' => ['nullable', 'numeric'],
            'bondCurrency' => ['nullable', Rule::in($allowed_currencies)],

            'tenderCost' => ['nullable', 'numeric'],
            'tenderCurrency' => ['nullable', Rule::in($allowed_currencies)],

            'publishStatus' => ['nullable'],

            'closeDate' => ['nullable', 'date'],

            'newFiles' => ['nullable', 'array'],
            'newFiles.*' => ['file', 'max:2048'],

            'files' => ['nullable', 'array'],
        ];
    }
}
