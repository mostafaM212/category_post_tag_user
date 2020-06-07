<?php
use App\Http\Controllers\Blog\PostsController ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name("welcome");

Route::get('blog/posts/{post}',[PostsController::class,'show'])->name('blog.show');

Route::get('blog/categories/{category}',[PostsController::class,'category'])->name('blog.category');

Route::get('blog/tags/{tag}',[PostsController::class,'tag'])->name('blog.tag');

Auth::routes();

Route::middleware('auth')->group(function (){


    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories','CategoriesController');

    Route::resource('posts','PostsController');

    Route::get('trashed_posts','PostsController@trashed')->name('trashed');

    Route::resource('tags','TagsController');

    Route::get('Users','UsersController@index')->name('users') ;

    Route::get('User','UsersController@logout')->name('user') ;

    Route::post('users/{user}/makeAdmin','UsersController@MakeAdmin')->name('users.makeAdmin') ;

    Route::get('users/profile','UsersController@edit')->name('users.edit-profile') ;

    Route::put('users/{user}/update','UsersController@update')->name('users.update-profile') ;

});

