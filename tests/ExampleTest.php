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

}
