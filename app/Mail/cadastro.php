<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class cadastro extends Mailable
{
    use Queueable, SerializesModels;
   public $name;
    /**
     * Create a new message instance.
     */
    public function __construct($Name)
    {
        $this->name= $Name;
    }
    public function build()
    {
        return $this->subject('Boas vindas')
            ->view('emailCadastro')
            ->with(['name' => $this->name]);
    }
}
