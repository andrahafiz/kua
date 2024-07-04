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
        $marriedId = Married::where('users_id', Auth()->user()->id)->first()->id;
        $documentmarried = MarriedDocument::where('married_id', $marriedId);

        $fields = [
            'N1', 'N3', 'ktp_husband', 'kk_husband',
            'akta_husband', 'ijazah_husband', 'photo_husband'
        ];

        if (in_array($attribute, $fields)) {
            $condition = $documentmarried->whereNotNull($attribute)->count();
            if (empty($value) && $condition <= 0) {
                return $fail('The ' . $attribute . ' is required.');
            }
            if (empty($value) && $condition > 0) {
                return true;
            }
        }
    }
}
