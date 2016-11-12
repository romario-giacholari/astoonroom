<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user = Auth::user();
            $id = $user->id;
            $articles = Article::where('user_id',$id)->get();
            $count = $articles->count();
           /*$userArticle = $user->articles()->first();*/
        return view('home', compact('articles', 'count'));
    }
}
