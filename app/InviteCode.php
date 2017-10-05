<?php

namespace Scarlet;

use Illuminate\Database\Eloquent\Model;

/**
 * @property null invite_code
 */
class InviteCode extends Model
{
    /**
     * Invite Code Length
     * This is going to screw me over later when this changes...
     */
    const inviteCodeLength = 8;

    /**
     * Character Set we can construct our invite codes from
     * @var string
     */
    public $charset = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';

    /**
     * InviteCode constructor.
     * @param null $invite_code
     */
    public function __construct($invite_code = null)
    {
        parent::__construct();

        $this->invite_code = $invite_code;

        if($invite_code === null) {
            $this->invite_code = $this->generate();
        }
    }

    /**
     * Generates an invite code
     * @return string
     */
    public function generate() : string {
        $invite_code = '';

        for ($p = 0; $p < $this::inviteCodeLength; $p++) {
            $invite_code .= $this->charset[random_int($this::inviteCodeLength, strlen($this->charset)) - 1];
        }

        return $invite_code;

    }

    /**
     * Checks to see if the Invite Code is Valid
     * @return bool
     */
    public function isValid() : bool {
        if(!$this->invite_code || strlen($this->invite_code) !== $this::inviteCodeLength) {
            return false;
        }

        $invite_row = $this->where('invite_code', $this->invite_code)->first();

        return empty($invite_row) || !$invite_row->userID;
    }

    public function assign($user) {

    }

    /**
     * Sets the Invite Code
     * @param string $invite_code
     */
    public function setInviteCode(string $invite_code)
    {
        $this->invite_code = $invite_code;
    }



}
