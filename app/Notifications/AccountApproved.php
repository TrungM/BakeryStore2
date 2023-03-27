<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
// use NotificationChannels\Twilio\TwilioChannel;
// use NotificationChannels\Twilio\TwilioSmsMessage;
use Illuminate\Notifications\Messages\VonageMessage;
class AccountApproved extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }
    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
        ->content('Your SMS message content');
    }

}
