<?php

namespace App\Services\Common\impl;


use App\Services\Common\SystemFileService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class SystemFileServiceImpl implements SystemFileService
{
    public function store(UploadedFile $image, string $path): string
    {
        $image_path = time() . ((string)Str::uuid()) . 'files.' . $image->getClientOriginalExtension();
        return $image->move($path, $image_path);
    }

    public function remove(string $path): bool
    {
        if (file_exists($path)) {
            return unlink($path);
        }
        return false;
    }

    public function updateWithRemoveOrStore(UploadedFile $image, string $path, string $oldFilePath = null): string
    {
        if ($oldFilePath) {
            $this->remove($oldFilePath);
        }
        return $this->store($image, $path);
    }

}
