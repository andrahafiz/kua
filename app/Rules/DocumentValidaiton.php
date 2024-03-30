<?php

namespace App\Rules;

use App\Models\Married;
use App\Models\MarriedDocument;
use Illuminate\Contracts\Validation\InvokableRule;

class DocumentValidaiton implements InvokableRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $married = Married::where('users_id', Auth()->user()->id)->first()->id;
        $documentmarried = MarriedDocument::where('married_id', $married);
        switch ($attribute) {
            case 'N1':
                $condition = $documentmarried->whereNotNull('N1')->count();
                if (empty($value) && $condition <= 0) {
                    return $fail('The ' . $attribute . ' is required.');
                }
                if (empty($value) && $condition > 0) {
                    return true;
                }
                break;
            case 'N3':
                $condition = $documentmarried->whereNotNull('N3')->count();
                if (empty($value) && $condition <= 0) {
                    return $fail('The ' . $attribute . ' is required.');
                }
                if (empty($value) && $condition > 0) {
                    return true;
                }
                break;
            case 'ktp_husband':
                $condition = $documentmarried->whereNotNull('ktp_husband')->count();
                if (empty($value) && $condition <= 0) {
                    return $fail('The ' . $attribute . ' is required.');
                }
                if (empty($value) && $condition > 0) {
                    return true;
                }
                break;
            case 'kk_husband':
                $condition = $documentmarried->whereNotNull('kk_husband')->count();
                if (empty($value) && $condition <= 0) {
                    return $fail('The ' . $attribute . ' is required.');
                }
                if (empty($value) && $condition > 0) {
                    return true;
                }
                break;
            case 'akta_husband':
                $condition = $documentmarried->whereNotNull('akta_husband')->count();
                if (empty($value) && $condition <= 0) {
                    return $fail('The ' . $attribute . ' is required.');
                }
                if (empty($value) && $condition > 0) {
                    return true;
                }
                break;
            case 'ijazah_husband':
                $condition = $documentmarried->whereNotNull('ijazah_husband')->count();
                if (empty($value) && $condition <= 0) {
                    return $fail('The ' . $attribute . ' is required.');
                }
                if (empty($value) && $condition > 0) {
                    return true;
                }
                break;
            case 'photo_husband':
                $condition = $documentmarried->whereNotNull('photo_husband')->count();
                if (empty($value) && $condition <= 0) {
                    return $fail('The ' . $attribute . ' is required.');
                }
                if (empty($value) && $condition > 0) {
                    return true;
                }
                break;

            default:
                # code...
                break;
        }
    }
}
