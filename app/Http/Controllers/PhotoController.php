<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Article;
use App;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id, Request $request)
    {

        $this->validate($request, [

            'file' => 'required|mimes:jpg,jpeg,png,bmp'

            ]

            );


       // $request()->file('file')->store('astonroom','s3');
       

        //$article = Article::find($id);

        //$request->file('file')->store('articles', 's3');
        
        $file = $request->file('file');
        $name = time().$file->getClientOriginalName();
        $s3 = \Storage::disk('s3');
        $filePath = 'astonroom/' . $name;
        $s3->put($filePath, file_get_contents($file));

    /* $file->move('article/photos', $name);
       
        $path = $request->file->path();
        $thumbnail = new Photo;
        $thumbnail->path = '/article/photos/'.$name;
        $thumbnail->article_id = $article->id;
        $thumbnail->save();
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return back();
    }
}
