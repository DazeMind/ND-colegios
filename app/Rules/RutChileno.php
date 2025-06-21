<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RutChileno implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) { return; }
        
        if (!preg_match('/^\d{7,8}-[0-9Kk]{1}$/', $value)) {
            $fail('El :attribute no tiene un formato válido (ej: 12345678-9 o 1234567-K).');
            return;
        }
        list($body, $verifier) = explode('-', $value);
        $cleanVerifier = strtoupper($verifier);
        $sum = 0;
        $multiplier = 2;
        for ($i = strlen($body) - 1; $i >= 0; $i--) {
            $sum += (int)$body[$i] * $multiplier;
            $multiplier = ($multiplier === 7) ? 2 : $multiplier + 1;
        }
        $mod = 11 - ($sum % 11);
        $expectedVerifier = ($mod === 11) ? '0' : (($mod === 10) ? 'K' : (string)$mod);
        if ($cleanVerifier !== $expectedVerifier) {
            $fail('El :attribute no es válido.');
        }
    }
}
