<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailPengesahanTerimaPermohonan extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($program)
    {
        $this->program = $program;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if ($this->program->tarikh_mula == $this->program->tarikh_akhir) {
            $tarikh = \Carbon\Carbon::parse($this->program->tarikh_mula)->format('d-m-Y');
        } else {
            $tarikh =  \Carbon\Carbon::parse($this->program->tarikh_mula)->format('d-m-Y').' hingga '.\Carbon\Carbon::parse($this->program->tarikh_akhir)->format('d-m-Y');
        }
        
        return (new MailMessage)
                    ->subject('E-PMI : PENGESAHAN PENYERTAAN PROGRAM')
                    ->greeting('Assalamualaikum / Selamat Sejahtera')
                    ->line('Adalah dimaklumkan bahawa permohonan anda untuk menyertai program '.$this->program->nama_program.' yang akan diadakan pada '.$tarikh.' telah berjaya.')
                    ->action('Lihat Permohonan', url('/program/senarai-permohonan-individu'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
