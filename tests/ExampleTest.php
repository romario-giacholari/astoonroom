<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->click('Browse')
             ->see('Browse');
    }

    public function testLoginLink(){

        $this->visit('/')
             ->click('Login')
             ->see('login');
    }

    public function testRegisterLink(){

        $this->visit('/')
             ->click('Register')
             ->see('register');
    }

  
}
