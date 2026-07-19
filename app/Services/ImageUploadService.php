<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    public function store(UploadedFile $file, string $directory = 'uploads', string $disk = 'public'): string
    {
        return $file->store($directory, $disk);
    }

    public function replace(?string $old, UploadedFile $file, string $directory = 'uploads', string $disk = 'public'): string
    {
        if ($old) {
            Storage::disk($disk)->delete($old);
        }

return $this->store($file, $directory, $disk);
    }
}
