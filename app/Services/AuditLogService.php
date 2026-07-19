<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;

class AuditLogService
{
    public function record(string $event, ?Model $subject = null, ?string $description = null, array $old = [], array $new = []): AuditLog
    {
        return AuditLog::create(['user_id' => auth()->id(), 'event' => $event, 'auditable_type' => $subject?->getMorphClass(), 'auditable_id' => $subject?->getKey(), 'description' => $description, 'old_values' => $old ?: null, 'new_values' => $new ?: null, 'url' => request()->fullUrl(), 'ip_address' => request()->ip(), 'user_agent' => request()->userAgent()]);
    }
}
