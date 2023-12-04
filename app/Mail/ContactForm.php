<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    public $details;


    public function __construct($details) {
        $this->details = $details;
    }

    public function build() {
        return $this->view('contact.message')
                    ->from($this->details['email'], $this->details['name'])
                    ->subject($this->details['subject']);
    }
}
