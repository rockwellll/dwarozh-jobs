<?php

namespace App\Http\Livewire;

use App\Concerns\SendsSessionNotification;
use Livewire\Component;

class ApplyToJob extends Component
{
    use SendsSessionNotification;

    public $viewedJob;
    public $user;
    public $didApply;

    public function mount() {
        $this->didApply = $this->user->didApplyTo($this->viewedJob);
    }

    public function apply() {
        $this->viewedJob->applicants()->attach($this->user->id);

        $this->didApply = true;
        $this->sendSuccess(__("users/default-user.operation_done"));
    }

    public function render()
    {
        return view('livewire.apply-to-job');
    }
}
