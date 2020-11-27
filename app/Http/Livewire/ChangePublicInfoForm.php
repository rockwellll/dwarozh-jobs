<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangePublicInfoForm extends Component
{
    public $name;
    public $email;
    public $mobileNumber;
    public $location;

    public $user;

    public function mount() {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->mobileNumber = $this->user->mobileNumber;
        $this->location = $this->user->location;
    }

    public $rules = [
        'name' => 'required',
        'email' => 'required | unique:users',
        'mobileNumber' => 'required | unique:users',
        'location' => 'required'
    ];

    public function render()
    {
        return view('livewire.change-public-info-form');
    }
}
