<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Article;
use App\User;

class ExampleTest extends TestCase
{
   /** @test */
     public function see_all_posts(){

        $posts = Article::all();
        $this->visit('/articles')
             ->see('Aston Triangle');
    }

     /** @test */
      public function see_specific_post(){

        $post = Article::first();
        $this->visit('articles/'.$post->id)
             ->see($post->body);
    }

    //Given there is a user

    //when  logged in

    //and deletes the ad

    //then the ad should not exist any more

     /** @test */
      public function login_user(){

        $user = User::first();
        $this->visit('/login')
             ->see('login')
             ->type($user->email,'email')
             ->type('secret','password')
             ->press('login')
             ->see('/home')
             ->click('delete');
    }


}
