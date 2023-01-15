<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckAppEnv implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return env('APP_ENV') !== 'local';
    }

    public function message()
    {
        return true;
    }
}
