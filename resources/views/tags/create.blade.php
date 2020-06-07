
@extends('layouts.app')

@section('content')
    <h1 class="text-primary text-center">{{isset($tag) ? 'Edit Tag':'Create Tag'}}</h1>
    @include('partials.errors')
    <div class="card card-default">
        <div class="card-header bg-primary">
            {{isset($tag) ? 'Edit Tag':'Create Tag'}}
        </div>
        <div class="card-body">
            <form action="{{isset($tag) ? route('tags.update',$tag->id):route('tags.store')}}" method="Post">
                @csrf
                @if(isset($tag))
                    @method('Put')
                @endif
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{isset($tag)?$tag->name:''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">{{isset($tag) ? 'Edit Tag':'Add Tag'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
