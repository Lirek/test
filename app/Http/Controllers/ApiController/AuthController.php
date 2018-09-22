<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Controllers\Controller;
use App\Events\CreateCodeSocialUserEvent;

use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class AuthController extends Controller
{
    public function register(Request $request) 
    {
        $credentials = $request->only('name', 'email', 'password');
        
        $rules = [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password'=>'required'
                 ];

        $validator = Validator::make($credentials, $rules);
        
        if($validator->fails()) 
        {
            return response()->json(['success'=> false, 'error'=> $validator->messages()],400);
        }
        
        $name = $request->name;
        
        $email = $request->email;
        
        $password = $request->password;
        
        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
        
        event(new CreateCodeSocialUserEvent($user->id));
        
        return response()->json(['success'=> true, 'message'=> 'Muchas Gracias por ser parte de Nuestra Plataforma le Recordamos finalizar su registro para disfrutar de nuestra plataforma en su totalidad']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $rules = [
                 'email' => 'required|email',
                 'password' => 'required',
                ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails())
        {
            return response()->json(['success'=> false, 'error'=> $validator->messages()], 401);
        }
        
        
        
        try {
            // attempt to verify the credentials and create a token for the user
            
            if (! $token = JWTAuth::attempt($credentials)) 
            
            {
                return response()->json(['success' => false, 'error' => 'No se encuentra registrado'], 404);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Error en sus datos por favor intente nuevamente'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]], 200);
    }

    public function logout(Request $request) 
    {
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
}
