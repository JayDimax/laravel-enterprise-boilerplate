<?php

namespace Modules\IAM;

use Illuminate\Support\ServiceProvider;

class IAMServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}
