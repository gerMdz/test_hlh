<?php

namespace App\Http\Helpers;

class DefaultHelper
{
    /**
     * @param string $email
     * @return bool
     */
    public function validation_mail(string $email):bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
