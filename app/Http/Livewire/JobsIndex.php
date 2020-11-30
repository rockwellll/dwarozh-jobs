<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\ParameterBag;

class JobsIndex extends Component
{
    use WithPagination;

    public $viewedJob;
    public $jobId;
    public $jobs;

    public function getJobProperty() {
        return Job::find($this->jobId);
    }

    public function mount() {
        $this->jobs = collect($this->jobs)->map(function ($job) {
            return [
                'ownerName' => $job->owner->name,
                'title' => $job->title,
                'id' => $job->id,
                'location' => $job->location
            ];
        });

        $this->jobId = $this->viewedJob->id;
    }

    public function viewJob($jobId) {
        $this->viewedJob = Job::find($jobId);
        $this->jobId = $jobId;
    }

    public function render()
    {
        return view('livewire.jobs-index');
    }
}
