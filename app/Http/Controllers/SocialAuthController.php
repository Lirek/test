<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
//use Laravel\Socialite;
use Socialite;

use Auth;
class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
//        return Socialite::driver($provider)->redirect()
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
//            dd($user);

                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                $charactersLength = strlen($characters);
                
                $randomString = '';
        
              for ($i = 0; $i < 6; $i++) 
                  {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                  }


                    $code=$randomString;

            $createUser = User::firstOrCreate(
                ['email' => $user->getEmail()],
                ['name' => $user->getName()],
                ['codigo_ref'=> $code],
                ['credito'=>0]
            );

            Auth::login($createUser);
            return view('home')
                ->with('alert',"Bienvenido $createUser->name");

        }catch (\GuzzleHttp\Exception\ClientException $e){
            dd($e);
        }
    }

}
