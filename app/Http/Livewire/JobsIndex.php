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
        $this->jobs = collect($this->jobs)->map(function ($job) {
            return [
                'ownerName' => $job->owner->name,
                'title' => $job->title,
                'id' => $job->id,
                'location' => $job->location
            ];
        });
    }

    public function viewJob($jobId) {
        $this->viewedJob = Job::find($jobId);
    }

    public function render()
    {
        return view('livewire.jobs-index');
    }
}
