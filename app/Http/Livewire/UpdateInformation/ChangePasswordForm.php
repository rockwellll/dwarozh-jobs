<?php

namespace App\Http\Livewire\UpdateInformation;

use App\Concerns\SendsSessionNotification;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordForm extends Component
{
    use SendsSessionNotification;

    public $old;
    public $password;
    public $password_confirmation;
    public $showPassword = false;
    public $rules = [
        'old' => 'required',
        'password' => 'required | confirmed',
    ];

    public $user;

    public function updatePassword() {
        $this->validate();

        if (!$this->isOldPasswordCorrect()) {
            $this->addError('old_dont_match', __('auth.dosent_match_old_password'));
            return;
        }

        $this->user->password = Hash::make($this->password);;
        $this->user->save();

        session()->flash(__('auth.password_reset_success'));

        $this->reset();
    }

    public function isOldPasswordCorrect() {
        return Hash::check($this->old, $this->user->password);
    }

    public function togglePasswordVisibility() {
        $this->showPassword = !$this->showPassword;
    }
}
