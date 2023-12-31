<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $attachmentPath;

  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    

    public function __construct($attachmentPath)
    {
        $this->attachmentPath = $attachmentPath;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.myTestMail')
                    ->subject('Your Email Subject')
                    ->attach($this->attachmentPath);
    }
}
