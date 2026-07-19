<?php

use App\Providers\AppServiceProvider;
use Modules\IAM\IAMServiceProvider;
use Modules\Settings\SettingsServiceProvider;

return [
    AppServiceProvider::class,
    IAMServiceProvider::class,
    SettingsServiceProvider::class,
];
