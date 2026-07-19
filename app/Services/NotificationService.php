<?php

namespace App\Services;

class NotificationService
{
    public function flash(string $type, string $message, ?string $title = null): void
    {
        session()->flash('toast', compact('type', 'message', 'title'));
    }
}
