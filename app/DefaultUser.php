<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultUser extends Model
{
    public $timestamps = false;

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }
}
