@extends('layouts.app')

@section('content')
    @include('partials.errors')
    <div class="card card-default" xmlns="http://www.w3.org/1999/html">
        <div class="card-header">
            {{isset($post)? 'Edit Post':'Create Post'}}
        </div>
        <div class="card-body">
            <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <lable class="" for="title">Title</lable>
                    <input type="text" class="form-control" name="title" id="title" value="{{isset($post)? $post->title :''}}">
                </div>
                <div class="form-group">
                    <lable class="" for="description">Description</lable>
                    <textarea  class="form-control" name="description" id="description" cols="5" rows="5">{{isset($post)? $post->description :''}}</textarea>
                </div>
                <div class="form-group">
                    <lable class="" for="content">Content</lable>
                    <input id="content" type="hidden" name="content" value="{{isset($post)? $post->content :''}}">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <lable class="" for="published_at">Published at</lable>
                    <input type="date" class="form-control" name="published_at" id="published_at" placeholder="{{isset($post)? $post->published_at :''}}">
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset('storage/'.$post->image)}}" alt="" style="width:690px ">
                    </div>

                @endif
                <div class="form-group">
                    <lable class="" for="image">Image</lable>
                    <input type="file" class="form-control" name="image" id="image" value="{{isset($post)? $post->image :''}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option name="{{$category->id}}" value ="{{$category->id}}"
                                @if( isset($post))
                                    @if($category->id == $post->category_id )
                                      selected
                                    @endif
                                @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if($tags->count()>0)
                    <div class="form-group">
                        <label for="tags">Tags
                                <select name="tags[]" id="tags" class="tag-selector form-control "  multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" style="width: 950px">{{$tag->name}}</option>
                                    @endforeach

                                </select>

                        </label>
                    </div>
                @endif
                <div class="form-control text-center">
                    <button type="submit" class="btn btn-success btn-sm ">{{isset($post)? 'Edit Post' :' Create Post'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script>
        $(document).ready(function() {
            $('.tag-selector').select2();
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        flatpickr('#published_at', {
            enableTime : true ,
            enableSeconds : true
        })

    </script>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
