<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/*
 * Tested at the command line using php tinker, using this command:
 * 
 * Mail::to($user = App\User::first())->send(new App\Mail\WelcomeAgainMail($user))
 * 
 * Also see this to customize the markdown components, 
 * 
 * $ php artisan vendor:publish --tag=laravel-mail
 *   Copied Directory [/vendor/laravel/framework/src/Illuminate/Mail/resources/views] To [/resources/views/vendor/mail]
 *   Publishing complete
 * 
 * Which creates a resources/views/vendor directory which can be customized. Note, you'll
 * also have to modify the config/mail.php => markdown to use the new themes/whatever.css. 
 * 
 */

class WelcomeAgainMail extends Mailable
{
    use Queueable, SerializesModels;

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
        return $this->markdown('emails.welcome-again');
    }
}
