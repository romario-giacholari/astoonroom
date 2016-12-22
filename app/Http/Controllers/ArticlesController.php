<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Photo;
use \Cache;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $articles = Article::with('photo')->orderBy('views', 'desc')->paginate(9);

        //$articles = Cache::remember('articles', 60, function()
        //{
        //    return Article::orderBy('views', 'desc')->get();
        //});
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
        'location'=>'required|in:Lakeside,William Murdoch,James Watt,Harriet Martineau,Mary Sturge',
        'body' => 'required|max:555',
        'year' => 'required'

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
        $article->save();
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
        $articles = Article::find($id);
         if($articles == null)
        {
            return back();
        }

        $image = Photo::find($articles->id);
        if(Auth::user())
        {
            if($articles->user_id != Auth::user()->id)
            {
            $articles->views += 1;
            $articles->save();
            }  
        }

        if(Auth::guest())
        {
           
            $articles->views += 1;
            $articles->save();
        }
        
       

        return view('articles.show', compact('articles','image'));
         
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



        public function search(Request $request)
        {
             $search = $request->q;
            
             /*$by = $request ->sort;*/
            
             $articles = Article::with('photo')->where("location", 'LIKE', "%$search%")->orderBy('views', 'desc')->paginate(9);

           if(count($articles) == 0){

              $articles = Article::with('photo')->where('title', 'LIKE', "%$search%")->orderBy('views', 'desc')->paginate(9);
                  
                  if(count($articles) == 0){

                $articles = Article::with('photo')->where('body', 'LIKE', "%$search%")->orderBy('views', 'desc')->paginate(9);
                        
                        if(count($articles) == 0){
                            \Session::flash('flash_message','No results');
                            return back();
                        }
                        
                  } 

                  
            }

            

        
            return view('articles.search', compact('articles'));
        }
}
