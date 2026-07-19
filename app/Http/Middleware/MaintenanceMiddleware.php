<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Settings\Application\Services\SettingsService;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (app(SettingsService::class)->get('maintenance_mode', '0') === '1' && ! $request->user()?->can('settings.manage')) {
            abort(503, 'The application is undergoing scheduled maintenance.');
        }

        return $next($request);
    }
}
