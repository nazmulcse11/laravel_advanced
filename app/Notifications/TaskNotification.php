<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskNotification extends Notification
{
    use Queueable;

    public $name = '';
    public $email = '';
    public $new_password = '';



    public function __construct($name,$email,$new_password){
        $this->name = $name;
        $this->email = $email;
        $this->new_password = $new_password;
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

         $name = $this->name;
         $email = $this->email;
         $new_password = $this->new_password;

        return (new MailMessage)->view('email.new_password',compact('name','email','new_password')) ;

    }


    public function toArray($notifiable){
        return [
            //
        ];
    }
}
