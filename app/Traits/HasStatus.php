<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasStatus
{
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function activate(): bool
    {
        return $this->update(['status' => 'active']);
    }

    public function deactivate(): bool
    {
        return $this->update(['status' => 'inactive']);
    }
}
