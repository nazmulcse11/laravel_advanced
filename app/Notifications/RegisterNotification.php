<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class RegisterNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $name = '';
    public $code = '';


    public function __construct($name,$code){
         $this->name = $name;
         $this->code = $code ;
    }

    public function via($notifiable){
        return ['mail'];
    }


    public function toMail($notifiable){
        $name = $this->name;
        $code = $this->code;
        return (new MailMessage)->view('email.account_confirmation',compact('name','code')) ;
    }

    public function toArray($notifiable){
        return [
            //
        ];
    }
}
