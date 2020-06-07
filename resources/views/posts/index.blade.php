@extends('layouts.app')

@section('content')


    <div class="d-flex justify-content-end">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
    </div>

    <div class="card card-default">
        <div class="card-header bg-info">Posts</div>
        <div class="card-body">
            <div class="card-body">
                @if($posts->count() >0)
                    <table class="table">
                    <thead>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>

                                <td>
                                    {{$post->title}}
                                </td>
                                <td>
                                    <img src="{{asset('storage/'.$post->image)}}" width="60px" height="60px" alt="">
                                </td>
                                <td class="text-info">
                                    {{$post->category->name}}
                                </td>
                                <td class="">
                                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info ">
                                        {{$post->trashed()? 'Restore':'Edit'}}
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger " type="submit">
                                            {{$post->trashed()?'Delete':'Trashed'}}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3 class="text-primary">No Posts Found</h3>
                @endif
            </div>
        </div>
    </div>

@endsection
