<?php

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{  
    public function testTrueAssertsToTrue() {
        //test if true = true :D, using methods from PHPunit, so have to use "this"
        $this->assertTrue(true);
    }
}