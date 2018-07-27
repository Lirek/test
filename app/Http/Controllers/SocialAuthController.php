<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
//use Laravel\Socialite;

use App\Events\CreateCodeSocialUserEvent;

use Socialite;

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
            $createUser = User::firstOrCreate(
                ['email' => $user->getEmail()],
                ['name' => $user->getName()]
            );

            event(new CreateCodeSocialUserEvent($createUser->id));
            
            auth()->login($createUser);
            
            return redirect('/home')
                ->with('alert',"Bienvenido $createUser->name");

        }catch (\GuzzleHttp\Exception\ClientException $e){
            dd($e);
        }
    }

}
