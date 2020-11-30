<?php

namespace App\Http\Livewire\UpdateInformation;

use App\Concerns\SendsSessionNotification;
use Livewire\Component;

class ChangePublicInfoForm extends Component
{
    use SendsSessionNotification;

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
        'email' => 'required',
        'mobileNumber' => 'required',
        'location' => 'required'
    ];

    public  function updatePublicInformation() {
        $this->validate();

        $user = auth()->user();
        $this->checkIfValueChanged($user);

        $user->name = $this->name;
        $user->email = $this->email;
        $user->mobileNumber = $this->mobileNumber;
        $user->location = $this->location;

        $user->save();


        $this->sendSuccess(__('users/default-user.info_updated_success'));
    }

    public function render()
    {
        return view('livewire.update-information.change-public-info-form');
    }

    public function checkIfValueChanged($user): void
    {
        if ($user->email != $this->email || $user->mobileNumber != $this->mobileNumber) {
            $this->validate([
                'email' => 'required | unique:users',
                'mobileNumber' => 'required | unique:users',
            ]);
        }
    }
}
