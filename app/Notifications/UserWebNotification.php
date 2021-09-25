<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserWebNotification extends Notification
{
    use Queueable;
    public $title='';
    public $course='';


    public function __construct($title,$course){
        $this->title = $title;
        $this->course = $course;
    }


    public function via($notifiable){
        return ['database'];
    }


    public function toMail($notifiable){
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable){
        return [
            'title'=>$this->title,
            'course'=>$this->course,
        ];
    }
}
