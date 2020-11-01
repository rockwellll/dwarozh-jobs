<?php

namespace App\Http\Livewire;

use App\Models\JobType;
use Livewire\Component;

class NewJobForm extends Component
{
    public $title = "";
    public $deadline = "";
    public $category = "";
    public $location = "";
    public $description= "";
    public $categories = [];

    public $rules = [
        'title' => 'required',
        'deadline' => 'required',
        'description' => 'required',
        'category' => 'required'
    ];

    public function mount() {
        $this->categories = JobType::all();
    }

    public function submit() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.new-job-form');
    }
}
