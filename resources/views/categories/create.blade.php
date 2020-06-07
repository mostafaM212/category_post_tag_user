
@extends('layouts.app')

@section('content')
    <h1 class="text-primary text-center">{{isset($category) ? 'Edit Category':'Create Category'}}</h1>
     @include('partials.errors')
    <div class="card card-default">
        <div class="card-header bg-primary">
            {{isset($category) ? 'Edit Category':'Create Category'}}
        </div>
        <div class="card-body">
            <form action="{{isset($category) ? route('categories.update',$category->id):route('categories.store')}}" method="Post">
                @csrf
                @if(isset($category))
                    @method('Put')
                @endif
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{isset($category)?$category->name:''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">{{isset($category) ? 'Edit Category':'Add Category'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
