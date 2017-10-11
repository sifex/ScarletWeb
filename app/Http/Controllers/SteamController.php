<?php

namespace Scarlet\Http\Controllers;

use Illuminate\Http\Request;
use Scarlet\Http\Controllers\Controller;
use Scarlet\Events\SteamConnect;
use Scarlet\Steam\SteamUser;
use Scarlet\User;
use Ehesp\SteamLogin\SteamLogin;

class SteamController extends Controller
{

    public function loginToSteamWithInviteCode($inviteCode) {
        return redirect($this->url(url('/steam/callback/' . $inviteCode)));
    }

    /**
     * @param $callbackURL
     * @return string
     */
    public function url($callbackURL) {
        // New Steam Login
        $login = new SteamLogin();
        return $login->url($callbackURL);
    }

    public function redirectToSteam($callback) {
        return redirect($this->url($callback));
    }

    public function steamCallback() {
        $steamUser = $this->steamVerifyLogin();
        $user = Scarlet\User::create([

        ]);
    }

    /**
     * Steam Login Function
     * @return bool|string
     */
    public function steamLogin() {
        $login = new SteamLogin();
        try {
            $steamID = $login->validate();
        } catch(\Exception $exception) {
            $steamID = false;
        }

        return $steamID;
    }

    /**
     * Verify Steam Login and return a steam user
     * @return \Illuminate\Http\RedirectResponse|SteamUser
     */
    public function steamVerifyLogin() {
        $steamID = $this->steamLogin();

        if(!$steamID) {
            return redirect()->route('v2index');
        }

        $steamUser = new SteamUser($steamID, env('STEAM_API_KEY'));

        return response()->json($steamUser);
    }
}
