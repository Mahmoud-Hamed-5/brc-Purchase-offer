<?php

namespace App\Http\Requests\Admin\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class Admin_PurchaseOfferEditRequest extends FormRequest
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
        return [
            'offerNumber' => ['nullable', 'numeric'],
            'materialType' => ['nullable', 'string'],
            'adDate' => ['nullable', 'date'],
            'closeDate' => ['nullable', 'date'],
            'publishStatus' => ['nullable'],
            'file' => ['nullable', 'file'],
        ];
    }
}
