<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class postsController extends Controller
{

    public function __construct()
    {
        $this->middleware('VerifyCategoriesCount')->only('create','Edit') ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();
        return view('posts.index',compact(['posts'])) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        $categories=Category::all();
        return view('posts.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
      //  return dd($request->all()) ;

        $image=$request->image->store('posts');
        $post=Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'published_at'=>$request->published_at ,
            'image'=>$image,
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id
        ]);
        if($request->tags){
            $post->tags()->attach($request->tags) ;
        }
        $post->save();
        session()->flash('session','The Post has been add successfully.');
        return redirect(route('posts.index')) ;
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
        $tags=Tag::all();
        $categories=Category::all();
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            $post->restore() ;
            session()->flash('session','The Post has been stored successfully.');
            return redirect(route('posts.index')) ;
        }else{
            return view('posts.create', compact(['post','categories','tags']));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, Post $post)
    {
        //7
        if($request->hasFile('image')){
            $post->deleteImage();
            $image=$request->image->store('posts');

        }

        $post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'published_at'=>$request->published_at,
            'image'=>$post->image
        ]);
        if($request->tag){
            $post->tags()->sync($request->tags) ;
        }
        $post->save();
        session()->flash('session','the Post have been updated successfully.');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            $post->deleteImage() ;
            $post->forceDelete();
        }else {
            $post->delete();
        }
        session()->flash('session','The Post is Trashed successfully.');
        return redirect(route('posts.index')) ;
    }




    public function trashed(){
        $posts=Post::onlyTrashed()->get();
        return view('posts.index',compact(['posts']));
    }


}
