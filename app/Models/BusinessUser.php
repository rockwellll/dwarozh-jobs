<?php

namespace App\Models;

use App\Concerns\DelegateProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    use HasFactory, DelegateProperties;
    public $timestamps = false;

    public $readers= [
        'name' => 'user->name',
        'email' => 'user->email',
        'location' => 'user->location',
        'mobileNumber' => 'user->mobileNumber'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
