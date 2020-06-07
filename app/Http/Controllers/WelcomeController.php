<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(Request $request){
        $categories=Category::all();
        $tags=Tag::all();
        $posts=Post::searched()->simplePaginate(4) ;
        //dd($posts);
//        if($request->search !=''){
//            $posts=Post::where('title','like','%'.$request->search.'%')->simplePaginate(2) ;
//        } else{
//            $posts=Post::simplePaginate(4);
//        }
        return view('welcome',compact(['categories','posts','tags'])) ;
    }
}
