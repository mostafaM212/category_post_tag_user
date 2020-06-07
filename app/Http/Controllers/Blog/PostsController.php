<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function show(Post $post){

        return view('blog.show' ,compact(['post']));
    }

    public function category(Category $category){
        $categories=Category::all();
        $tags=Tag::all() ;
        $posts=$category->posts()->searched()->simplePaginate(2) ;
        return view('blog.category',compact(['category','posts','categories','tags'])) ;
    }

    public function tag(Tag $tag){
        $tags=Tag::all() ;
        $categories=Category::all();
        $posts=$tag->posts()->searched()->simplePaginate(3) ;
        return view('blog.tag',compact(['tag','posts','categories']))->with('tags',$tags);
    }
}
