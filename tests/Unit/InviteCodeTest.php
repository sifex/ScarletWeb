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

    public function setUp() {
        parent::setUp();

        // New Invite Code
        $this->testInviteCode = new InviteCode();
        $this->testInviteCode->save();

        // New User
        $this->testUser = new User();
        $this->testUser->save();
    }

    /**
     * Check to see if adding an Invite Code and the checking it against the Check Invite Code
     *
     * @return void
     */
    public function testCheckInviteCode()
    {
        $invite_controller = new InviteController();
        $this->assertTrue($invite_controller->checkInviteCodeIsValid($this->testInviteCode->invite_code));
    }

    /**
     * Checking to see if the Invite Code returns false upon an invite code being incorrect
     *
     * @return void
     */
    public function testIncorrectCheckInviteCode()
    {
        $invite_controller = new InviteController();
        $this->assertFalse($invite_controller->checkInviteCodeIsValid('123456'));
    }


    /**
     * Checking to see if the Invite Code returns false upon an invite code being incorrect
     *
     * @return void
     */
    public function testUserTakenInviteCode()
    {
        $invite_controller = new InviteController();

        $this->assertTrue($invite_controller->assignInviteCode($this->testInviteCode->invite_code, $this->testUser));
    }
}
