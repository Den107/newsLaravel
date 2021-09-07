<?php

namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;

class UploadedService
{
    public function fileUpload(UploadedFile $file)
    {

        $ext = $file->getClientOriginalExtension();
        $fileName = uniqid('file-') . '.' . $ext;
        $file->storeAs('news', $fileName, 'public');
        if ($file) {
            return $file;
        }
        throw new Exception('file not found');
    }
}
