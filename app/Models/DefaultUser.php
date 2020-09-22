<?php

namespace App\Models;

use App\Concerns\DelegateProperties;
use Illuminate\Database\Eloquent\Model;

class DefaultUser extends Model
{
    use DelegateProperties;

    public $readers= [
        'name' => 'user->name',
        'email' => 'user->email',
    ];

    public $timestamps = false;

    public function user() {
        return $this->morphOne(User::class, 'userable');
    }

    public function jobs() {
        return $this->belongsToMany(Job::class, 'applicant_job', 'job_id', 'applicant_id');
    }

    public function applyToJob($job) {
        $this->jobs()->save($job);
    }
}
