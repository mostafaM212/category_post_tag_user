@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-info">My Profile :{{$user->email}}</div>

        <div class="card-body">
            <form action="{{route('users.update-profile',$user->id)}}" method="Post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="about">About Me</label>
                    <textarea name="about" id="" class="form-control" cols="30" rows="5" class="form-control">{{$user->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <h6 class="form-control">{{$user->role}}</h6>
                </div>
                <button type="submit" class="btn btn-success ">Update Profile</button>
            </form>
            You are logged in!
        </div>
    </div>
@endsection
