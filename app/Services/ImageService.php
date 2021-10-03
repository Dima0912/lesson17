<?php

namespace App\Service;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Services\Contracts\ImageServiceInterface;

class ImageService implements ImageServiceInterface
{
    public static function upload($image)
    {
        if (is_null($image)) {
            return '.';
        }

        if (is_string($image)) {
            return str_replace('public/storage', '', $image);
        }

        if ($is_string = is_string($image)) {
            $imageData = explode('.', $image);
        }

        $imagePath = implode('/', str_split(Str::random(8), 2))
        . '/'
        . Str::random(16)
        . '.'
        . (!$is_string ? $image->getClientOriginalExtension() : $imageData[1]);

        Storage::put(
            $imagePath,
            File::get($image)
        );
        return $imagePath;
    }

    public static function remove($image)
    {
        Storage::delete($image);
    }
}