<?php

namespace App\Concerns;

use App\Models\Job;

trait CanFavoriteJobs {
    public function favoriteJobs()
    {
        return $this->morphedByMany(Job::class, 'favoritable', 'favorites', 'favoritable_id', 'user_id');
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
