<?php

namespace App\Mail;

use App\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $reserve;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('caraevents@admin.com', 'caraevents')
                    ->to($this->reserve->email, auth()->user()->name)
                    ->bcc('another@another.com')
                    ->subject('Reservation for Caraevents')
                    ->markdown('emails.reservations.placed');
    }
}
