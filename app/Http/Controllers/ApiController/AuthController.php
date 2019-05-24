<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Controllers\Controller;
use App\Events\CreateCodeSocialUserEvent;

use App\User;

use JWTAuth;
use Socialite;

use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use App\Events\WelcomeEmailEvent;

use Auth;


class AuthController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->only('nombre', 'email', 'contrasena','repetir_contrasena');

        $rules = [
            'nombre' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users',
            'contrasena' => 'required|max:191',
            'repetir_contrasena' => 'required|same:contrasena'
        ];

        $validator = Validator::make($credentials, $rules);

        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages()],200);
        }

        $name = $request->nombre;
        $email = $request->email;
        $password = $request->contrasena;

        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
        event(new CreateCodeSocialUserEvent($user->id));
        event(new WelcomeEmailEvent($user));
        return response()->json(['meta'=>['code'=>200],'data'=>['message'=>'Muchas gracias por ser parte de nuestra plataforma, le recordamos finalizar su registro para disfrutar de la totalidad de nuestra plataforma']],200);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages()],200);
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['meta'=>['code'=>400],'data'=>'Credenciales incorrectas'],200);
            }
        } catch (JWTException $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Hemos encontrado un error, por favor intente nuevamente'],200);
        }
        return response()->json(['meta'=>['code'=>200],'data'=>['token'=>$token]],200);
    }

    public function logout(Request $request)
    {
        /* Api sin uso, se elimina el token desde el app */
        $this->validate($request, ['token' => 'required']);

        try {

            JWTAuth::invalidate($request->input('token'));

            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);

        } catch (JWTException $e) {

            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

    public function recover(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $error_message = "Your email address was not found.";
            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
        }
        try {
            Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject('Your Password Reset Link');
            });
        } catch (\Exception $e) {
            //Return with error
            $error_message = $e->getMessage();
            return response()->json(['success' => false, 'error' => $error_message], 401);
        }
        return response()->json([
            'success' => true, 'data'=> ['message'=> 'A reset email has been sent! Please check your email.']
        ]);
    }

    public function AuthSocialUser(Request $request) {

        $createUser = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name
        ]);
        auth()->login($createUser);
        if($createUser->wasRecentlyCreated) {
            if ($request->type=="facebook") {
                $url = "https://graph.facebook.com/".$request->idSocial."/picture?type=large";
                $headers = get_headers($url, 1);
                if( isset($headers['Location']) ){
                    $archivo = $headers['Location'];
                    $imgFile = file_get_contents($archivo);
                    $store_path = public_path().'/user/'.auth()->user()->id.'/profile/';
                    $nameFile = 'userpic'.$request->name.'.jpg';
                    if (!file_exists($store_path)) {
                        mkdir($store_path, 0777, true);
                    }
                    $filex = $store_path.$nameFile;
                    $fh = fopen($filex, 'w');
                    fputs($fh,$imgFile);
                    fclose($fh);
                } else {
                    $path = NULL;
                }
            } else {
                //logica para el enlace de google
                $url = $request->avatar;
                $img = file_get_contents($url);
                $store_path = public_path().'/user/'.auth()->user()->id.'/profile/';
                $nameFile = 'userpic'.$request->name.'.jpg';
                if (!file_exists($store_path)) {
                    mkdir($store_path, 0777, true);
                }
                $filex = $store_path.$nameFile;
                $fh = fopen($filex, 'w');
                fputs($fh,$img);
                fclose($fh);
            }
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';

            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $code = $randomString;
            $user = User::find(auth()->user()->id);
            $user->last_name = $request->last_name;
            $user->alias = $request->alias;
            $user->img_perf = '/user/'.auth()->user()->id.'/profile/'.$nameFile;
            $user->codigo_ref = $code;
            $user->save();
            event(new WelcomeEmailEvent($createUser));
        }
        $token = JWTAuth::fromUser($createUser);
        return response()->json(['status' => '1', 'data'=> [ 'token' => $token ]], 200);
    }

}