<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class JobsIndex extends Component
{
    use WithPagination;

    public $viewedJob;
    public $jobs;

    public function mount() {
        $this->jobs = $this->jobs->items();
    }

    public function viewJob($job) {

    }

    public function render()
    {
        return view('livewire.jobs-index');
    }
}
