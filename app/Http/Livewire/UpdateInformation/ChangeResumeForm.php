<?php

namespace App\Http\Livewire\UpdateInformation;

use App\Concerns\SendsSessionNotification;
use App\Models\Attachment;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeResumeForm extends Component
{
    use SendsSessionNotification, WithFileUploads;

    public $user;
    public $attachment;

    protected $rules = [
        'attachment' => 'required | mimetypes:application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document | max:2500'
    ];


    public function updateResume() {
        $this->validate();

        $attachment = Attachment::of($this->attachment);
        $user = auth()->user();

        if (is_null($user->attachment)) {
            $user->attachment()->save($attachment);
        } else {
            Attachment::where('id', $user->attachment->id)
                ->delete();
            $user->attachment()->save($attachment);
        }

        $this->sendSuccess();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.update-information.change-resume-form');
    }
}
