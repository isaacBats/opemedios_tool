<?php

namespace App\Mail;

use App\Http\Controllers\MultipleController;
use App\Multiple;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Blocknews extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * cuando la nota no ha sido enviada en un correo 
     */
    const NO_ENVIADO = 0;

    /**
     * cuando la nota ha sido enviada en un correo 
     */
    const ENVIADO = 1;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $news = Multiple::where('dispatched', self::NO_ENVIADO)->get();
        foreach ($news as $new) {
            $new->theme_id = MultipleController::getThemeById($new->theme_id);
        }

        $today = MultipleController::getTodayAttribute()->format('l d, F Y');
        $newsSorted = MultipleController::sortNews($news);
        
        return $this->from('info@opemedios.com.mx')
            ->subject('Newsletter AgroBio_' . date('d-M-Y'))
            ->markdown('emails.block', compact('today', 'newsSorted'));
    }
}
