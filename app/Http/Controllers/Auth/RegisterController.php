<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\WelcomeEmailEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalNotification;
use Illuminate\Support\Facades\Crypt;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';

              for ($i = 0; $i < 6; $i++)
                  {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }


            $code=$randomString;

            $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'codigo_ref' => $code,
            'credito'=> 0,
                ]);

            $encrypted_email = Crypt::encryptString($user->email);

            $url= url('/').'/validate/'.$encrypted_email;
            event(new WelcomeEmailEvent($user,$url));

            $emailAdmin = "bcastillo@leipel.com";
            $motivo = "Usuario pendiente por aprobar";
            Mail::to($emailAdmin)->send(new ApprovalNotification($motivo));

        return $user;
    }
}
