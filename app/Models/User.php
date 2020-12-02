<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function deleteSelfAndRelatedData() {
        DB::transaction(function () {
            $this->userable->delete();

            if($this->image != null) {
                $this->image->delete();
            }

            if($this->attachment != null) {
                $resume = $this->attachment;
                Storage::delete($resume->url);
                $resume->delete();
            }

            self::delete();
        });
    }
}
