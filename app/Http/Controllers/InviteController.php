<?php

namespace Scarlet\Http\Controllers;

use Illuminate\Http\Request;
use Scarlet\Steam\SteamUser;
use Scarlet\User;
use Scarlet\InviteCode;

class InviteController extends Controller
{

    public $steamOutRouteName = 'redirectToSteam';

    public $steamInRouteName = 'steamVerifyLogin';

    public $inviteCodeLength = InviteCode::inviteCodeLength;

    public function index(Request $request) {
        return view('splash.index');
    }

    /**
     * Assign User to an Invite Code, hereby using the invite code up.
     * @param $inviteCode
     * @param $user
     * @return bool
     */
    public function assignInviteCode($inviteCode, $user) {

        $invite_row = \Scarlet\InviteCode::where('invite_code', $inviteCode)->first();

        if(!$invite_row || !$user->id) {
            return false;
        }

        $invite_row->userID = $user->id;

        if(!$invite_row->save()) {
            return false;
        }

        return true;
    }

    public function checkInviteCodeIsValid($inviteCode) {
        $invite = new InviteCode();
        return $invite->setInviteCode($inviteCode)->isValid();

    }

    /**
     * ---------------------------------
     *  API SECTION
     * ---------------------------------
     */

    /**
     * @param $inputCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function api_checkInviteCodeIsValid($inputCode) {
        return response()->json([
            "status" => $this->checkInviteCodeIsValid($inputCode),
            "inviteCode" => $inputCode
        ]);
    }




}