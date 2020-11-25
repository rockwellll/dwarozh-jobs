<?php

namespace App\Concerns;

use App\Models\Favorite;
use App\Models\Job;

trait CanFavoriteJobs {
//    public function favoriteJobs()
//    {
//        return $this->morphToMany(Job::class, 'favoritable', 'favorites', 'user_id', 'favoritable_id');
//    }

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favoritable', 'favorites');
    }

    public function favoriteJobs()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id')->where('favoritable_type', 'App\Models\Job');
    }

    public function contains(Job $job) {
        $l = $this->favoriteJobs()->where('favoritable_id', $job->id)->get();

        if (count($l) == 0)
            return false;

        return true;
    }

    public function toggle(Job $job) {
        $l = $this->favoriteJobs()->where('favoritable_id', $job->id)->get();

        if (count($l) == 0) {
            $this->favoriteJobs()->save($job);
        } else {
            $this->favoriteJobs()->detach($job);
        }

        return true;
    }
}
