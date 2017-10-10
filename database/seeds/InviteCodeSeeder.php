<?php

use Illuminate\Database\Seeder;
use Scarlet\InviteCode;

class InviteCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invite_code = new InviteCode();
        $invite_code->save();
    }
}
