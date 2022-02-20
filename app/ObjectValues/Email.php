<?php 

namespace App\ObjectValues;

use Exception;

class Email 
{

    private string $email;

    function __construct(string $email)
    {
        if(!$this->validateEmail($email))
        {

            throw new Exception('Invalid email format string');
        }
        
        $this->email = $email;
    }

    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function __toString() : string{
        return $this->email;
    }
}