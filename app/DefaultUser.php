<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultUser extends Model
{
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
