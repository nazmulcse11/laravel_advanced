<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PassResetNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $password = '';

    public function __construct($password){
        $this->password = $password;
    }

    public function via($notifiable){
        return ['mail'];
    }


    public function toMail($notifiable){
        $password = $this->password;
        return (new MailMessage)->view('email.new_password',compact('password'));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
