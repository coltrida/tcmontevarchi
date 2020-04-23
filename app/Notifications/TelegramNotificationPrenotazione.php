<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramNotificationPrenotazione extends Notification
{
    use Queueable;

    public $campo;
    public $ora;
    public $giorno;
    public $id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($campo, $ora, $giorno, $id)
    {
        $this->campo = $campo;
        $this->ora = $ora;
        $this->giorno = $giorno;
        $this->id = $id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toTelegram($notifiable)
    {
        /*if($this->campo == 'campo1' || $this->campo == 'campo2'){
            $immagine = '/img/terra.jpg';
        }else{
            $immagine = '/img/sintetico.jpg';
        }*/

        /*return TelegramFile::create()
            ->to($this->id)
            ->file('/img/terra.jpg', 'photo')
            ->content('Prenotazione effettuata per il '.$this->campo.' alle ore '. $this->ora.' del giorno '. $this->giorno);*/

        return TelegramMessage::create()
            ->to($this->id)
            ->content('Prenotazione effettuata per il '.$this->campo.' alle ore '. $this->ora.' del giorno '. $this->giorno);
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
