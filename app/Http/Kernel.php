<?php
 $routeMiddleware = [
    'verified.phone' => \App\Http\Middleware\EnsurePhoneIsVerified::class,
];