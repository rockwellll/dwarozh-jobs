<?php

namespace App\Models;

use App\Concerns\DelegateProperties;
use Illuminate\Database\Eloquent\Model;
use TobiSchulz\Favoritable\Traits\HasFavorites;

class DefaultUser extends Model
{
    use DelegateProperties, HasFavorites;

    public $readers = [
        'name' => 'user->name',
        'email' => 'user->email',
        'location' => 'user->location'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function applications()
    {
        return $this->belongsToMany(Job::class, 'applicant_job', 'applicant_id', 'job_id');
    }

    public function didApplyTo($job)
    {
        return $this->applications()->where("job_id", $job->id)->count() != 0;
    }

    public function hasFavoritedJobs()
    {
        return $this->favorites(\App\Models\Job::class)->count() != 0;
    }
}
