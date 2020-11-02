<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasDniPhoto
{
    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateDniPhoto(UploadedFile $photo_1, UploadedFile $photo_2)
    {
        tap($this->dni_photo_path, function ($previous) use ($photo_1, $photo_2) {
            $this->forceFill([
                'dni_photo_path_1' => $photo_1->storePublicly(
                    'dni-photos',
                    ['disk' => $this->dniPhotoDisk()]
                ),
                'dni_photo_path_2' => $photo_2->storePublicly(
                    'dni-photos',
                    ['disk' => $this->dniPhotoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->dniPhotoDisk())->delete($previous);
            }
        });
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getDniPhotoUrlOneAttribute()
    {
        return $this->dni_photo_path_1
                    ? Storage::disk($this->dniPhotoDisk())->url($this->dni_photo_path_1)
                    : $this->defaultDniPhotoUrl();
    }

    public function getDniPhotoUrlTwoAttribute()
    {
        return $this->dni_photo_path_2
                    ? Storage::disk($this->dniPhotoDisk())->url($this->dni_photo_path_2)
                    : $this->defaultDniPhotoUrl();
    }

    /**
     * Get the default Dni photo URL if no Dni photo has been uploaded.
     *
     * @return string
     */
    protected function defaultDniPhotoUrl()
    {
        return '/img/cedula_default.jpg';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function dniPhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
}