<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RealTest extends TestCase
{

  public function testBasicExample()
    {
        $this->visit('/')
             ->see('astonroom');
    }

}