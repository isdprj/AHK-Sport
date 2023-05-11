<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service\SocialAccountService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider)->stateless());
        Auth::login($user);

        return redirect()->route('index');
    }

}

