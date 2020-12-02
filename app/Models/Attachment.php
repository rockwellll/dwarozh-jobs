<?php

namespace App\Models;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\TemporaryUploadedFile;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @param UploadedFile | TemporaryUploadedFile $file
     * @return Attachment an attachment that can be saved to a user
     */
    public static function of($file) {
        $originalName = $file->getClientOriginalName();
        $name = $file->hashName();
        $path = $file->storeAs('resumes', $name, 'public');

        return new Attachment(['name' => $originalName, 'url' => $path]);
    }
}
