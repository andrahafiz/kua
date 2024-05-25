<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['string', 'sometimes', 'nullable', 'max:120'],
            'number_document' => ['string', 'sometimes', 'nullable', 'max:120'],
            'file' => ['sometimes', 'nullable', 'file', 'mimes:png,jpg,pdf'],
        ];
    }
    public function messages()
    {
        return [];
    }
}
