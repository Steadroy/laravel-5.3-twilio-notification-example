<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class InspireUser extends Notification
{
    use Queueable;
    public $quote;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($quote)
    {
        //
        $this->quote = $quote;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param   mixed  $notifiable
     * @return array
     */
      public function via($notifiable)
      {
          return [TwilioChannel::class];
      }

    public function toTwilio($notifiable)
     {
         return (new TwilioSmsMessage())
             ->content("Hello {$notifiable->name} here is your inspiring quote for the day: {$this->quote}");
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
