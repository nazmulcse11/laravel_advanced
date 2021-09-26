<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserWebNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $web_id='';
    public $title='';
    public $course='';


    public function __construct($web_id,$title,$course){
        $this->web_id = $web_id;
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
            'web_id'=>$this->web_id,
            'title'=>$this->title,
            'course'=>$this->course,
        ];
    }
}
