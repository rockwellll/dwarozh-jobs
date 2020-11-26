<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PasswordChangeForm extends Component
{
    public $old;
    public $password;
    public $password_confirmation;
    public $showPassword = false;
    public $rules = [
        'old' => 'required',
        'password' => 'required | confirmed',
    ];

    public function updatePassword() {
        $this->validate();

        if (!$this->isOldPasswordCorrect()) {
            $this->addError('old_dont_match', __('auth.dosent_match_old_password'));
            return;
        }

        $user = auth()->user();
        $user->password = Hash::make($this->password);;
        $user->save();

        session()->flash('success', __('auth.password_reset_success'));
        $this->reset();
    }

    public function isOldPasswordCorrect() {
        return Hash::check($this->old, auth()->user()->password);
    }

    public function togglePasswordVisibility() {
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.password-change-form');
    }
}
