<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminWebNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $enroll_id='';
    public $name='';
    public $mobile='';
    public $course='';


    public function __construct($enroll_id,$name,$mobile,$course)
    {
        $this->enroll_id = $enroll_id;
        $this->name = $name;
        $this->mobile = $mobile;
        $this->course = $course;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            'enroll_id'=>$this->enroll_id,
            'name'=>$this->name,
            'mobile'=>$this->mobile,
            'course'=>$this->course,
        ];
    }
}
