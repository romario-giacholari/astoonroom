<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('views', 'desc')->get();

        return view ('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
        'title' => 'required|max:25',
        'location'=>'required|max:17',
        'body' => 'required|max:555'

         ]);
        $user = Auth::user();
        $article = new Article;
        $article->user_id = $user->id;
        $article->title = $request->title;
        $article->contact = $request->contact;
        $article->location = $request->location;
        $article->gender = $request->gender;
        $article->year = $request->year;
        $article->body = $request->body;
        $article->color = '#ffffff ';
        $article->save();
        \Session::flash('flash_message','Your ad has been created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::findOrFail($id);
        if(Auth::user())
        {
            if($articles->user_id != Auth::user()->id)
            {
            $articles->oldviews = $articles->views;
            $articles->views += 1;
            $articles->save();
            }  
        }
        
        if(count($articles)<0)
        {
            return redirect('/articles');
        }

        return view('articles.show', compact('articles'));
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);

        if($articles->user_id == Auth::user()->id)
        {
            return view ('articles.edit',compact('articles'));
        }
        else{
            return redirect('/articles');
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
    
            $article = Article::find($id);
            $article->update($request->all());
            $article->save();
            return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return back();
    }



        public function search(Request $request)
        {
             $search = $request->q;
             /*$by = $request ->sort;*/
            
             $articles = Article::where("location", 'LIKE', "%$search%")->orderBy('created_at', 'desc')->get();

           if(count($articles) == 0){

              $articles = Article::where('title', 'LIKE', "%$search%")->orderBy('created_at', 'desc')->get();
                  
                  if(count($articles) == 0){

                $articles = Article::where('body', 'LIKE', "%$search%")->orderBy('created_at', 'desc')->get();
                  }
            }
        
            return view('articles.search', compact('articles'));
        }
}
