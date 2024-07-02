<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use App\Rules\DocumentValidaiton;
use App\Rules\DocumentValidation;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $action;

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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->action = $this->input('action');
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [
            "location_name" => ['required', 'string'],
            "akad_date_masehi" => ['required', 'date', 'date_format:Y-m-d'],
            "akad_time_masehi" => ['required',  'date_format:H:i'],
            "akad_time_hijriah" => ['required',  'date_format:H:i'],
            "akad_location" => ['required', 'string'],
            "desa_location" => ['required', 'string'],

            "nationality_wife" => ['required', 'string'],
            "nik_wife" => ['required', 'string'],
            "name_wife" => ['required', 'string'],
            "location_birth_wife" => ['required', 'string'],
            "date_birth_wife" => ['required', 'date', 'date_format:Y-m-d'],
            "old_wife" => ['required', 'numeric'],
            "status_wife" => ['required', 'string'],
            "religion_wife" => ['required', 'string'],
            "address_wife" => ['required', 'string'],

            "citizen_husband" => ['required', 'in:WBI,WNA'],
            "nationality_husband" => ['required', 'string'],
            "nik_husband" => ['required_if:nationality_husband,WNI', 'string'],
            "no_passport_husband" => ['required_if:nationality_husband,WNA', 'string'],
            "nik_husband" => ['required', 'string'],
            "name_husband" => ['required', 'string'],
            "location_birth_husband" => ['required', 'string'],
            "date_birth_husband" => ['required', 'date', 'date_format:Y-m-d'],
            "old_husband" => ['sometimes', 'nullable', 'numeric'],
            "status_husband" => ['required', 'string'],
            "religion_husband" => ['required', 'string'],
            "religion_husband" => ['required', 'string'],
            "education_husband" => ['required', 'string'],
            "job_husband" => ['required', 'string'],
            "address_husband" => ['required', 'string'],
            "email_husband" => ['required', 'email'],
            "phone_number_husband" => ['sometimes', 'nullable', 'string'],

            "name_father_husband"               => ['required', 'string'],
            "is_unknown_father_husband"         => ['sometimes', 'nullable', 'string'],
            "citizen_father_husband"            => ['required_unless:is_unknown_father_husband,true', 'in:WNI,WNA'],
            "nationality_father_husband"        => ['required_with:citizen_father_husband', 'string'],
            "nik_father_husband"                => ['required_if:citizen_father_husband,WNI', 'nullable', 'string'],
            "no_passport_father_husband"        => ['required_if:citizen_father_husband,WNA', 'nullable',  'string'],
            "location_birth_father_husband"     => ['required_unless:is_unknown_father_husband,true', 'nullable', 'string'],
            "date_birth_father_husband"         => ['required_unless:is_unknown_father_husband,true', 'nullable', 'date', 'date_format:Y-m-d'],
            "religion_father_husband"           => ['required_unless:is_unknown_father_husband,true', 'nullable', 'string'],
            "job_father_husband"                => ['required_unless:is_unknown_father_husband,true', 'nullable', 'string'],
            "address_father_husband"            => ['required_unless:is_unknown_father_husband,true', 'nullable', 'string'],

            "name_mother_husband"               => ['required', 'string'],
            "is_unknown_mother_husband"         => ['sometimes', 'nullable', 'string'],
            "citizen_mother_husband"            => ['required_unless:is_unknown_mother_husband,true', 'in:WNI,WNA'],
            "nationality_mother_husband"        => ['required_with:citizen_mother_husband', 'string'],
            "nik_mother_husband"                => ['required_if:citizen_mother_husband,WNI', 'nullable', 'string'],
            "no_passport_mother_husband"        => ['required_if:citizen_mother_husband,WNA', 'nullable',  'string'],
            "location_birth_mother_husband"     => ['required_unless:is_unknown_mother_husband,true', 'nullable', 'string'],
            "date_birth_mother_husband"         => ['required_unless:is_unknown_mother_husband,true', 'nullable', 'date', 'date_format:Y-m-d'],
            "religion_mother_husband"           => ['required_unless:is_unknown_mother_husband,true', 'nullable', 'string'],
            "job_mother_husband"                => ['required_unless:is_unknown_mother_husband,true', 'nullable', 'string'],
            "address_mother_husband"            => ['required_unless:is_unknown_mother_husband,true', 'nullable', 'string'],

            "N1" => [new DocumentValidaiton(), 'mimes:pdf'],
            "N3" => [new DocumentValidaiton(), 'mimes:pdf'],
            "N5" => ['sometimes', 'nullable', 'mimes:pdf'],
            "surat_akta_cerai" =>  ['sometimes', 'nullable', 'mimes:pdf'],
            "surat_izin_komandan" =>  ['sometimes', 'nullable', 'mimes:pdf'],
            "ktp_husband" => [new DocumentValidaiton(), 'mimes:pdf'],
            "kk_husband" => [new DocumentValidaiton(), 'mimes:pdf'],
            "akta_husband" => [new DocumentValidaiton(), 'mimes:pdf'],
            "ijazah_husband" => [new DocumentValidaiton(), 'mimes:pdf'],
            "photo_husband" => [new DocumentValidaiton(), 'mimes:pdf'],
            "proof_payment" => ['sometimes', 'nullable', 'mimes:png,jpg']
        ];
        return $rule;
    }
}
