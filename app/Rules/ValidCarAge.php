<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class ValidCarAge implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Ensure that $value is a valid date
        if (!strtotime($value)) {
            return false;
        }

        // Calculate the date four years ago
        $fourYearsAgo = Carbon::now()->subYears(4);

        // Check if the submitted date is greater than or equal to four years ago
        return strtotime($value) >= $fourYearsAgo->timestamp;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must not be older than four years.';
    }
}
