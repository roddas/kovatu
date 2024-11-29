<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\VerifyAccountEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class VerifyEmailNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        $to = $event->utilizador->email;
        $data = [
            'nome' => $event->utilizador->nome,
            'sobrenome' => $event->utilizador->sobrenome,
        ];
        $subject = 'Verificação da conta';
        Mail::send('mail.verify-account', $data, function ($message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
        });
    }
}
