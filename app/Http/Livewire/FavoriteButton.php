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
        $this->isFavorited = $this->user->userable->contains($this->job);
    }

    public function submit() {
        $this->user->userable->toggle($this->job);

        $this->isFavorited = !$this->isFavorited;
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
