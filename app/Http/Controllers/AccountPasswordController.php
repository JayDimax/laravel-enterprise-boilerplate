<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AccountPasswordController extends Controller
{
    public function __invoke(): View
    {
        return view('account.password');
    }
}
