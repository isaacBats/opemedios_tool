<?php

namespace App\Mail;

use App\Http\Controllers\MultipleController;
use App\Multiple;
use App\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Blocknews extends Mailable
{
    use Queueable, SerializesModels;

     
    public $config;
    
    public $newsletter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($config, $newsletter)
    {
        $this->config = $config;
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emails = explode(',', $this->config->emails);
        
        return $this->from('newsletter@opemedios.com.mx', 'Newsletter')
            // ->cc($emails)
            ->subject('CARPETA INFORMATIVA UNAM ' . date('d/M/Y'))
            ->view('emails.unam');
    }
}
