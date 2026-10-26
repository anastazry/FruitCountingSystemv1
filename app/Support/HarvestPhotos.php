<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class HarvestPhotos
{
    public static function disk(): string
    {
        return config('filesystems.harvest_disk', 'public');
    }

    public static function url(string $path): string
    {
        $disk = Storage::disk(self::disk());

        return self::disk() === 's3'
            ? $disk->temporaryUrl($path, now()->addMinutes(10))
            : $disk->url($path);
    }
}
