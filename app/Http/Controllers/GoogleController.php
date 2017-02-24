<?php

namespace App\Http\Controllers;

use Socialite;
use App\SocialProvider;
use App\User;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        try{
            $socialUser = Socialite::driver('google')->user();
        } catch(Exception $e){
            return redirect('/');
        }

        $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider){

            $name = explode(" ", $socialUser->getName(), 2);
            $data = [
                'firstname' => $name[0],
                'lastname' => $name[1],
                'password' => 'google',
                'is_activated' => 1
            ];

            $user = User::firstOrCreate(
                    ['email' => $socialUser->getEmail()],
                    [
                        'firstname' => $name[0],
                        'lastname' => $name[1],
                        'password' => 'google',
                        'is_activated' => 1
                    ]
                );

            $user->socialProviders()->create([
                'provider_id' => $socialUser->getId(),
                'provider' => 'google'
                ]);

        } else{
            $user = $socialProvider->user;
        }
        
        auth()->login($user);
        return redirect('/home');

    }
}
