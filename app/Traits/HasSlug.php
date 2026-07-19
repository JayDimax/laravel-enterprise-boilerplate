<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::saving(function ($model) {
            if (! $model->slug || $model->isDirty($model->slugSource ?? 'name')) {
                $model->slug = Str::slug($model->{$model->slugSource ?? 'name'});
            }
        });
    }
}
