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

    public function viewJob($jobId) {
        $this->viewedJob = Job::find($jobId);
        $this->jobs = $this->jobs;
    }

    public function render()
    {
        return view('livewire.jobs-index');
    }
}
