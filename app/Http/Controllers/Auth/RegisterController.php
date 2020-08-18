<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Jobs\sendNewUserEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $recentUser = User::where('email',$data['email'])->first();

        dispatch(new sendNewUserEmail($recentUser))
                    //->onConnection('sqs') // specific connection
                    //->onQueue('processing'); // queue name
                    ->delay(now()->addSeconds(10)); // delay of 5 secs

        return $user;   


         // or choice mailer explicitly

        /*

        Mail::mailer('mailgun')
            ->to($data['email'])
               // ->cc();
               // ->bcc(); 
            ->send(new WelcomeNewUser($user)); 

        */


        // or delay the email

        /*

            $when = now()->addMinutes(10);

            Mail::to($request->user())
                ->cc($moreUsers)
                ->bcc($evenMoreUsers)
                ->later($when, new OrderShipped($order));
              
        */

        // or pushing to specific queue
        
        /* $message = (new OrderShipped($order))
                ->onConnection('sqs')
                ->onQueue('emails');

            Mail::to($request->user())
                ->cc($moreUsers)
                ->bcc($evenMoreUsers)
                ->queue($message);        
        */

    }
}
