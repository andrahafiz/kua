<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "location_name" => ['required', 'string'],
            "akad_date_masehi" => ['required', 'date', 'date_format:Y-m-d'],
            "akad_time_masehi" => ['required',  'date_format:H:i'],
            "akad_date_hijriah" =>  ['required', 'date', 'date_format:Y-m-d'],
            "akad_time_hijriah" => ['required',  'date_format:H:i'],
            "akad_location" => ['required', 'string'],
            "nationality_wife" => ['required', 'string'],
            "nik_wife" => ['required', 'string'],
            "name_wife" => ['required', 'string'],
            "location_birth_wife" => ['required', 'string'],
            "date_birth_wife" => ['required', 'date', 'date_format:Y-m-d'],
            "old_wife" => ['required', 'numeric'],
            "status_wife" => ['required', 'string'],
            "religion_wife" => ['required', 'string'],
            "address_wife" => ['required', 'string'],
            "nationality_husband" => ['required', 'string'],
            "nik_husband" => ['required', 'string'],
            "name_husband" => ['required', 'string'],
            "location_birth_husband" => ['required', 'string'],
            "date_birth_husband" => ['required', 'date', 'date_format:Y-m-d'],
            "old_husband" => ['required', 'numeric'],
            "status_husband" => ['required', 'string'],
            "religion_husband" => ['required', 'string'],
            "address_husband" => ['required', 'string'],
            "N1" => ['required', 'mimes:pdf'],
            "N3" => ['required', 'mimes:pdf'],
            "N5" => ['sometimes', 'nullable', 'mimes:pdf'],
            "surat_akta_cerai" =>  ['sometimes', 'nullable', 'mimes:pdf'],
            "surat_izin_komandan" =>  ['sometimes', 'nullable', 'mimes:pdf'],
            "ktp_husband" => ['required', 'mimes:pdf'],
            "kk_husband" => ['required', 'mimes:pdf'],
            "akta_husband" => ['required', 'mimes:pdf'],
            "ijazah_husband" => ['required', 'mimes:pdf'],
            "photo_husband" => ['required', 'mimes:pdf'],
        ];
    }
}
