<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
//use Browser;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {

        $this->browse(function ($browser) {
            $browser->assertTrue(true, true);
        });
    }
}
