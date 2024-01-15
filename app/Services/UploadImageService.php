<?php

namespace App\Services;

class UploadImageService {
    public function upload($image)
    {

        // Upload file
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        return $imageName;
    }
}
