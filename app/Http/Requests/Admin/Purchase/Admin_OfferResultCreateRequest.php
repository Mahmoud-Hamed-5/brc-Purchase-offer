<?php

namespace App\Http\Requests\Admin\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class Admin_OfferResultCreateRequest extends FormRequest
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
            'offerNumber' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'publishStatus' => ['nullable'],
            // 'file' => ['required', 'file'],
            'file' => ['nullable', 'file'],
        ];
    }
}
