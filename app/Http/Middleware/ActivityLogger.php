<?php

namespace App\Http\Middleware;

use App\Services\AuditLogService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivityLogger
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        if ($request->user() && ! $request->isMethod('GET') && $response->getStatusCode() < 400) {
            app(AuditLogService::class)->record(strtolower($request->method()), description: $request->route()?->getName());
        }

return $response;
    }
}
