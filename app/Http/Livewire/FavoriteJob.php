<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavoriteJob extends Component
{
    public $job;
    public $isRemoved=false;

    public function removeFromFavorite() {

        $this->isRemoved = true;
    }

    public function render()
    {

        return view('livewire.favorite-job');
    }
}
