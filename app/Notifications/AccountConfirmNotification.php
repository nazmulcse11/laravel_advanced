<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountConfirmNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $name = '';
    public $mobile = '';
    public $email = '';

    public function __construct($name,$mobile,$email){
        $this->name = $name;
        $this->mobile = $mobile;
        $this->email = $email;
    }


    public function via($notifiable){
        return ['mail'];
    }


    public function toMail($notifiable){
        $name = $this->name;
        $mobile = $this->mobile;
        $email = $this->email;
        return (new MailMessage)->view('email.account_info',compact('name','mobile','email'));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
