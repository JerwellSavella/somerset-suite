<?php

use App\Providers\AppServiceProvider;
use App\Providers\Auth\CustomUserProvider;
use App\Providers\FortifyServiceProvider;

return [
    AppServiceProvider::class,
    CustomUserProvider::class,
    FortifyServiceProvider::class,
];
