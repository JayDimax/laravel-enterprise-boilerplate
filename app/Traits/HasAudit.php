<?php

namespace App\Traits;

use App\Services\AuditLogService;

trait HasAudit
{
    protected static function bootHasAudit(): void
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::$event(fn ($model) => app(AuditLogService::class)->record($event, $model, class_basename($model).' '.$event, $event === 'updated' ? $model->getOriginal() : [], $model->getAttributes()));
        }
    }
}
