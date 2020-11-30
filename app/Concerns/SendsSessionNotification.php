<?php

namespace App\Concerns;

trait SendsSessionNotification
{
    public function sendSuccess($message = null)
    {
        $message = $message == null ? __('users/default-user.operation_done') : $message;
        session()->flash('success', $message);
    }
}
