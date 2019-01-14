<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;

class SocialAuthController extends Controller
{

   public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
 	
        $authUser = $this->findOrCreateUser($user, $provider);
        
        // Chỗ này để check xem nó có chạy hay không
        // dd($user);
 
        Auth::login($authUser, true);
 
        return redirect()->route('journal.index');
    }
 
    private function findOrCreateUser($socialiteUser, $provider){
        $authUser = User::where('provider_id', $socialiteUser->id)->first();
 
        if($authUser){
            return $authUser;
        }
 		// dd($socialiteUser);
        return User::create([
            'first_name' => $socialiteUser->name,
            'password' => $socialiteUser->token,
            'email' => $socialiteUser->email,
            'provider_id' => $socialiteUser->id,
            'provider' => $provider,
        ]);
    }
}