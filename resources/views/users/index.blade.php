@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header bg-info">Users</div>
        <div class="card-body">
            <div class="card-body">
                @if($users->count() >0)
                    <table class="table">
                        <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src=" {{\Thomaswelton\LaravelGravatar\Facades\Gravatar::src($user->id)}}" width="40px" height="40px" style="border-radius: 50% " alt="">
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td class="text-info">
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->role}}
                                </td>
                                @if(!$user->isAdmin())
                                    <td>
                                        <form action="{{route('users.makeAdmin',$user->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">make admin</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-primary">No Uers Found</h3>
                @endif
            </div>
        </div>
    </div>

@endsection
