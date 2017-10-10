<?php

namespace Tests\Unit;

use Scarlet\InviteCode;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Scarlet\Http\Controllers\InviteController;
use Scarlet\User;
use Hash;

class InviteCodeTest extends TestCase
{
    use DatabaseTransactions;

    public $testInviteCode;

    public $testUser;

    public $inviteController;

    public function setUp() {
        parent::setUp();

        // New Invite Code
        $this->testInviteCode = new InviteCode();
        $this->testInviteCode->save();

        // New User
        $this->testUser = new User();
        $this->testUser->save();

        // New Invite Controller
        $this->inviteController = new InviteController();
    }

    /**
     * Check to see if adding an Invite Code and the checking it against the Check Invite Code
     *
     * @return void
     */
    public function testCheckInviteCode()
    {

        $this->assertTrue(
            $this->inviteController->checkInviteCodeIsValid($this->testInviteCode->invite_code));
    }

    /**
     * Checking to see if the Invite Code returns false upon an invite code being incorrect
     *
     * @return void
     */
    public function testIncorrectCheckInviteCode()
    {
        $this->assertFalse(
            $this->inviteController->checkInviteCodeIsValid('123456'));
    }

    /**
     * Checking to see if the Invite Code returns false upon an invite code being incorrect
     *
     * @return void
     */
//    public function testUserTakenInviteCode()
//    {
//        $this->assertTrue(
//            $this->invite_controller->assignInviteCode($this->testInviteCode->invite_code, $this->testUser));
//    }

    /**
     * Checking to see if the Invite Code returns false upon an invite code being incorrect
     *
     * @return void
     */
    public function testWithSpacesAroundInviteCode()
    {
        $this->assertTrue(
            $this->inviteController->checkInviteCodeIsValid("    " . $this->testInviteCode->invite_code . "      "));
    }
}
