<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
