<?php

namespace App\Concerns;

use App\Models\Job;

trait CanFavoriteJobs {
    public function favoriteJobs()
    {
        return $this->morphedByMany(Job::class, 'favoritable', 'favorites', 'favoritable_id', 'user_id');
    }
}
