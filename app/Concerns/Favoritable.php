<?php

namespace App\Concerns;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Favoritable
{
    /**
     * Get all favorites associated with the model.
     */
    public function favorites(): MorphToMany
    {
        return $this->morphToMany(User::class, 'favoritable', 'favorites')->withTimestamps();
    }

    /**
     * Mark the model record as favorite
     */
    public function favorite($userId): void
    {
        $userId = $userId ?: auth()->user()->id;

        $favorite = new Favorite([
            'user_id' => $userId,
        ]);

        $this->favorites()->save($favorite);
    }

    public function addFavorite($userId = null)
    {

    }

    public function toggleFavorite($userId = null)
    {
        $userId = $userId ?: auth()->user()->id;

        $this->isFavorited($userId) ? $this->removeFavorite($userId) : $this->addFavorite($userId);
    }

    public function removeFavorite($userId = null)
    {
        $userId = $userId ?: auth()->user()->id;

        $this->favorites()
            ->where('user_id', $userId)
            ->delete();
    }

    public function isFavorited($userId = null)
    {
        $userId = $userId ?: auth()->user()->id;

        return $this->favorites()
            ->where('user_id', $userId)
            ->exists();
    }
}
