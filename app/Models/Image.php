<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded= [];

    protected $table = 'profile_images';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
