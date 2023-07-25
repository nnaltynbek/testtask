<?php

namespace App\Services\Common;


use Illuminate\Http\UploadedFile;

interface SystemFileService
{
    public function store(UploadedFile $image, string $path): string;

    public function remove(string $path);

    public function updateWithRemoveOrStore(UploadedFile $image, string $path, string $oldFilePath = null): string;

}
