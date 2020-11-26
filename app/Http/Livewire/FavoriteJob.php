<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavoriteJob extends Component
{
    public $job;
    public $isRemoved=false;

    public function removeFromFavorite() {
        $user = auth()->user()->userable;

        $this->job->removeFavorite($user->id);
        $this->isRemoved = true;
    }

    public function render()
    {
        if ($this->isRemoved)
            return '';

        return view('livewire.favorite-job');
    }
}
