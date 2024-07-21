<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenghuluCreateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_penghulu' => ['string', 'required', 'max:50'],
            'phone' => ['numeric', 'required', 'unique:penghulu,phone'],
            'address' => ['string'],
            'photo' => ['file', 'image', 'mimes:png,jpg'],
            'status' => ['required', 'in:1,0'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama harus karakter',
            'name.max' => 'Nama tidak boleh lebih dari 50 karakter',


            'phone.required' => 'No HP wajib diisi',
            'phone.numeric' => 'No HP tidak valid',
            'phone.unique' => 'No HP telah digunakan',

            'address.string' => 'Alamat harus karakter',

            'photo.mimes' => 'Gambar harus berformat png atau jpg'
        ];
    }
}
