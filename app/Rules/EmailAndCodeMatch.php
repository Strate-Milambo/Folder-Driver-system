<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailAndCodeMatch implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!User::where('email', $value['email'])->where('AccessCode', $value['code'])->exists()) {
            $fail("User not found. 😊👉👉👉");
        }
    }
}
