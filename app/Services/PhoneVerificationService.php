<?php

namespace App\Services;
use Twilio\Rest\Client;

class PhoneVerificationService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(
            config('twilio.sid'),
            config('twilio.token')
        );
    }

    public function sendVerificationCode($phoneNumber)
    {
        $code = rand(100000, 999999); // 6-digit code
        
        $this->twilio->messages->create(
            $phoneNumber,
            [
                'from' => config('twilio.from'),
                'body' => "Your verification code is: $code"
            ]
        );
        
        return $code;
    }
}