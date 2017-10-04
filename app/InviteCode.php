<?php

namespace Scarlet;

use Illuminate\Database\Eloquent\Model;
use Hash;

class InviteCode extends Model
{

    const inviteCodeLength = 8;

    public $charset = "0123456789ABCDEFGHJKLMNPQRSTUVWXYZ";

    public function __construct($invite_code = null)
    {
        parent::__construct();

        if($invite_code === null) {
            for ($p = 0; $p < $this::inviteCodeLength; $p++) {
                $this->invite_code .= $this->charset[random_int($this::inviteCodeLength, strlen($this->charset)) - 1];
            }
        } else {
            $this->invite_code = $invite_code;
        }
    }

    /**
     * @param string $invite_code
     */
    public function setInviteCode(string $invite_code)
    {
        $this->invite_code = $invite_code;
    }

    public function isValid() {
        if(!$this->invite_code || strlen($this->invite_code) !== $this::inviteCodeLength) {
            return false;
        }

        $invite_row = InviteCode::where('invite_code', $this->invite_code)->first();

        if (!empty($invite_row)) {
            if($invite_row->userID) {
                return false;
            }
        }

        return true;
    }

    public function assign($user) {

    }


}
