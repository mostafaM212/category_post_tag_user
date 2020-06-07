<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes ;
    //
    protected $fillable=[
        'title',
        'description',
        'content',
        'published_at',
        'image',
        'category_id',
        'user_id'
    ];
    protected $dates =[
        'published_at'
    ];

    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    //post-tag relationship
    public function tags(){

        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User') ;
    }

    public function scopePublished($query){
        return $query->where('published_at','<=',now()) ;
    }

    public function scopeSearched($query){
        $search=request()->search ;

        if(!$search){
            return $query->published() ;
        }
        return $query->published()->where('title','like',"%{$search}%") ;
    }


}
