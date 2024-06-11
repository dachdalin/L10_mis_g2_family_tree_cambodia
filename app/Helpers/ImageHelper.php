<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;


class ImageHelper
{
    /**
     * Upload an image to storage.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param string|null $filename
     * @return string
     */
    public static function upload($file, $directory, $filename = null)
    {
        $filename = $filename ?? time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, 'public');
        return $path;
    }

    /**
     * Update an image in storage.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param string $oldPath
     * @param string|null $filename
     * @return string
     */
    public static function update($file, $directory, $oldPath, $filename = null)
    {
        // Delete the old image
        self::delete($oldPath);

        // Upload the new image
        return self::upload($file, $directory, $filename);
    }

    /**
     * Delete an image from storage.
     *
     * @param string $path
     * @return bool
     */
    public static function delete($path)
    {
        return Storage::disk('public')->delete($path);
    }

}

