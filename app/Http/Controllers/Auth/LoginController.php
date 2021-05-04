<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\SocialProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     *  Show application's login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        session()->put('previousUrl', url()->previous());

        return view('auth.login');
    }

    public function redirectTo()
    {
        return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($website)
    {
        
        return Socialite::driver($website)->stateless()->redirect();
        
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($website)
    {

        try 
        {
            $socialUsers = Socialite::driver($website)->stateless()->user();
        }
        catch(Exception $e) 
        {
            return redirect('/');
        }

        
        $socialProvider = SocialProvider::where('provider_id', $socialUsers->getId())->first();
        // dd($socialProvider);
        if(!$socialProvider)
        {
            $user = User::firstOrCreate(
                    ['name' => $socialUsers->getName()],
                    ['email' => $socialUsers->getEmail()],
                );

            $user->socialProviders()->create(
                ['provider_id' => $socialUsers->getId(), 'provider' => $website]
            );
        }
        else

        $user = $socialProvider->user;

        Auth::login($user, true);

        return redirect('/');
    }

    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();

    // }

    // public function handleFacebookCallback()
    // {

    //    $user = Socialite::driver('google')->user();

    //    $this->_registerOrLoginUser();

    //    return redirect()->route('/');

    // }

    // protected function _registerOrLoginUser($data)
    // {
    //     $user = User::where('email', $data->email)->first();

    //     if(!$user)
    //     {
    //         $user = new User();
    //         $user->name = $data->name;
    //         $user->email = $data->email;
    //         $user->provider_id = $data->provider_id;
    //         $user->avatar = $data->avatar;
    //         $user->save();
    //     }

    //     Auth::login($user);
    // }
}
