<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Middleware\verfyIsAdmin ;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verifyIsAdmin')->only('index','makeAdmin') ;
    }

    public function index(){

        $users=User::all();
         return view('users.index',compact(['users'])) ;
    }

    public function logout(){
        Auth::logout() ;

        return redirect('/home') ;
    }

    public function makeAdmin(User $user){
        $user->role='admin' ;
        $user->save();
        session()->flash('session','that user is became an Admin');
        return redirect()->back();
    }

    public function edit(){
        $user=Auth::user() ;
        return view('users.edit',compact(['user'])) ;
    }

    public function update(User $user ,Request $request){
        $user->name=$request->name ;
        $user->about =$request->about ;
        $user->save();
        session()->flash('session','the user profile is updated successfully.');
        return redirect(route('home')) ;
    }
}
