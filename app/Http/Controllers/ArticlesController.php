<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Photo;
use App\User;
use \Cache;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::with('photo')->orderBy('views', 'desc')->paginate(12);
       
        return view ('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
        'location'=>'required|max:25',
        'postcode'=> 'required|max:8',
        'body' => 'required|max:555',
        'year' => 'required'

         ]);

        $user = Auth::user();
        $article = new Article($request->all());
        $user->articles()->save($article);
        \Session::flash('flash_message','Your ad has been created');
        return redirect('articles/'.$article->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $article = Article::find($id);

         if(is_null($article))
         {
            return redirect('/articles');
         }

        $image = Photo::find($article->id);

        if(Auth::user())
        {
            //If user logged in but does not own the article
            if($article->user_id != Auth::user()->id)
            {
                //increment views of particular article
                $article->views += 1;
                $article->save();
            }  
        }

        if(Auth::guest())
        {
            //if user is a guest increment views
            $article->views += 1;
            $article->save();
        }
        
        return view('articles.show', compact('article','image'));
         
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

        //If user owns the articles then it could be edited
        if($articles->user_id == Auth::user()->id)
        {
            return view ('articles.edit',compact('articles'));
        }
        else
        {
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
    
        $this->validate($request, [
        'title' => 'required|max:25',
        'location'=>'required|max:25',
        'body' => 'required|max:555',
        'year' => 'required'

         ]);

            $article = Article::findOrFail($id);
            $article->update($request->all());
            $article->save();
            return back();
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



    public function search(Article $articles ,Request $request)
    {
        
        $search = $request->q;
            
         $articles = Article::with('photo')->where('location', 'LIKE', "%$search%")->orderBy('views', 'desc')->paginate(12);

           if(count($articles) == 0){

              $articles = Article::with('photo')->where('title', 'LIKE', "%$search%")->orderBy('views', 'desc')->paginate(12);
                  
                  if(count($articles) == 0){

                     $articles = Article::with('photo')->where('body', 'LIKE', "%$search%")->orderBy('views', 'desc')->paginate(12);
                        
                        if(count($articles) == 0){
                            \Session::flash('flash_message','No results');
                            return back();
                        }
                        
                  } 

                  
            }

          return view('articles.search', compact('articles'));
        }
}
