<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewUser extends Notification
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Welcome to the Community')
                    ->from(env('MAIL_USERNAME'), 'Billionaires Drive')
                    ->line('Welcome to the BillionairesDrive community. Our vision here is to become the one-stop shop if you are looking to start an online Instagram business.')
                    ->line('What are you waiting for? There\'s tons of resources and content waiting for you. To top it all off, you\'ve got access to a large community of like-minded people.')
                    ->action('Access Dashboard', url('/login'))
                    ->line('Once again, welcome to the community! Let\'s begin.');
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
            //
        ];
    }
}
