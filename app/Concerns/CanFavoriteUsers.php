<?php

namespace App\Concerns;

use App\Models\BusinessUser;

trait CanFavoriteUsers {
    public function favoriteUsers()
    {
        return $this->morphedByMany(BusinessUser::class, 'favoritable', 'favorites', 'favoritable_id', 'user_id');
    }
}
