<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends VerifyEmailNotification
{
    /**
     * Build the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Verify your Freelance Hub email')
            ->view('emails.verify-email', [
                'user' => $notifiable,
                'url' => $this->verificationUrl($notifiable),
            ]);
    }
}
