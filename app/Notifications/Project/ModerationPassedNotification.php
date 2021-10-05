<?php

namespace App\Notifications\Project;

use App\Entity\Project\Projects\Project;
use App\Notifications\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class ModerationPassedNotification extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function via($notifiable)
    {
        return ['mail', SmsChannel::class];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Moderation is passed')
            ->greeting('Hello!')
            ->line('Your project successfully passed a moderation.')
            ->action('View Project', route('projects.show', $this->project))
            ->line('Thank you for using our application!');
    }

    public function toSms(): string
    {
        return 'Your project successfully passed a moderation.';
    }
}
