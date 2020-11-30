<?php

namespace App\Http\Livewire\UpdateInformation;

use App\Concerns\MakeAttachments;
use App\Concerns\SendsSessionNotification;
use App\Models\Attachment;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeResumeForm extends Component
{
    use SendsSessionNotification, WithFileUploads, MakeAttachments;

    public $user;
    public $attachment;

    protected $rules = [
        'attachment' => 'required | mimetypes:application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document | max:2500'
    ];

    public function mount() {

    }

    public function updateResume() {
        $this->validate();
        $attachment = $this->makeAttachment($this->attachment);
        $user = auth()->user();

        if (is_null($user->attachment)) {
            auth()->user()->attachment()->save($attachment);
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
