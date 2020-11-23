<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guarded = [];

    public function userable() {
        return $this->morphTo();
    }

    public function image() {
        return $this->hasOne(Image::class, 'user_id', 'id');
    }

    public function isBusinessUser() {
        return $this->userable_type == "App\Models\BusinessUser";
    }

    public function attachment() {
        return $this->hasOne(Attachment::class);
    }
}
