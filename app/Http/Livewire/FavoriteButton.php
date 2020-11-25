<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class FavoriteButton extends Component
{
    use AuthorizesRequests;

    public $isFavorited;

    public $user;
    public $job;

    public function mount() {
        $this->user = auth()->user();
        $this->isFavorited = $this->job->isFavorited($this->user->userable->id);
    }

    public function submit() {
        $this->job->toggleFavorite($this->user->userable->id);

        $this->isFavorited = !$this->isFavorited;
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
