<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DailyTaskReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $tasks;

    public function __construct($user, $tasks)
    {
        $this->user = $user;
        $this->tasks = $tasks;
    }

    public function build()
    {
        return $this->view('emailRecorda')
                    ->subject('Lembrete Diário das Suas Tarefas');
    }
    }



