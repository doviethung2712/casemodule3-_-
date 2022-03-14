<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {

        try {
            $user = Socialite::driver($provider)->user();

            $finduser = User::where('email', $user->email)->first();
            if($finduser){
                $finduser->name = $user->name;
                $finduser->social_type = $provider ;
                // $finduser->social_id = $user->id ;
                $finduser->save();
                Auth::login($finduser);

                return redirect()->route('home');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 2,
                    'social_id'=> $user->id,
                    'social_type'=> $provider,
                    'password' => encrypt('my-google')
                ]);

                Auth::login($newUser);

                return redirect()->route('home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
