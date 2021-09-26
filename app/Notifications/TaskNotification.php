<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $title = '';



    public function __construct($title){
        $this->title = $title;
    }


    public function via($notifiable){
        return ['mail'];
    }


    public function toMail($notifiable){
        // return (new MailMessage)
        // ->line($this->name)
        // ->line($this->email)
        // ->line('Your new password for Web Journey Login')
        // ->line($this->new_password);

         $title = $this->title;

        return (new MailMessage)->view('email.notification_email',compact('title')) ;

    }


    public function toArray($notifiable){
        return [
            //
        ];
    }
}
