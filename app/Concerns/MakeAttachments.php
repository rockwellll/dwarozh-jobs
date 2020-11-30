<?php

namespace App\Concerns;

use App\Models\Attachment;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Auth\Authenticatable;
use Livewire\TemporaryUploadedFile;

trait MakeAttachments {

    /**
     * @param UploadedFile | TemporaryUploadedFile $file
     * @return Attachment an attachment that can be saved to a user
     */
    public function makeAttachment($file) {
        $originalName = $file->getClientOriginalName();
        $name = $file->hashName();
        $path = $file->storeAs('resumes', $name, 'public');

        return new Attachment(['name' => $originalName, 'url' => $path]);
    }
}
