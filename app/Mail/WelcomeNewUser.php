<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class WelcomeNewUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    //protected $user; secure way to pass data using with method;

    public function __construct(User $user)
    {
        $this->user = $user; //automatically be available in the view.
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //you can use 'from' here explicitly or specific globally in [from] config/mail.php if its remain same.

        return $this->from('vivek@test.com')->view('email.newuser'); //->with(['user'=>$this->user->name]);
    }
}
