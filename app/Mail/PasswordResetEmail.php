<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var $user */
    private $user;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('caraevents@admin.com', 'caraevents')
                    ->to($this->user->email, $this->user->name)
                    ->subject('Caraevents account password changed')
                    ->markdown('emails.reservations.reset_password', [
                        'user' => $this->user,
                    ]);
    }
}
