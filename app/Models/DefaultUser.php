<?php

namespace App\Models;

use App\Concerns\DelegateProperties;
use App\Concerns\CanFavoriteUsers;
use App\Concerns\CanFavoriteJobs;
use Illuminate\Database\Eloquent\Model;

class DefaultUser extends Model
{
    use DelegateProperties, CanFavoriteUsers, CanFavoriteJobs;

    public $readers = [
        'name' => 'user->name',
        'email' => 'user->email',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function applications()
    {
        return $this->belongsToMany(Job::class, 'applicant_job', 'job_id', 'applicant_id');
    }

    public function applyToJob($job)
    {
        $this->jobs()->save($job);
    }

}
