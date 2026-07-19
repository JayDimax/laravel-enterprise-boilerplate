<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AuditLogController extends Controller
{
    public function __invoke(): View
    {
        return view('system.audit');
    }
}
