<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function upload($imageFile, string $folderName)
    {
        $timestamp = now()->format('YmdHis');
        $fileName = $imageFile->getClientOriginalName();
        $fileNameToStore = '/originals/' . $timestamp . '/' . $fileName;

        Storage::putFileAs('public/images/' . $folderName . '/originals/' . $timestamp . '/', $imageFile, $fileName);

        return $fileNameToStore;
    }
}
