<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// user routes
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/complete/{username}', 'PagesController@completeProfile')->middleware('isCurrentUser');
Route::post('/postProfileData', 'PagesController@store');
Route::get('/edit/{username}', 'PagesController@edit')->middleware('isCurrentUser');
Route::post('/updateUser', 'PagesController@update');
Route::get('/author/{userId}', 'PagesController@show');

// post routes
Route::post('/submitPost', 'PostsController@store');
Route::get('/edit/{category}/{postId}', 'PostsController@edit')->middleware('isAuthenticPostUpdate');
Route::post('/updatePost', 'PostsController@update');
Route::get('/delete/{postId}', 'PostsController@destroy')->middleware('isAuthenticPostUpdate');

Route::get('/post/{category}/{postId}', 'PostsController@index');
Route::get('/category/{category}', 'PostsController@show');

// comment routes
Route::post('/submitComment', 'CommentsController@store');
Route::get('/deleteComment/{commentId}', 'CommentsController@destroy')->middleware('isAuthenticCommentUpdate');
Route::get('/comments/{userId}', 'CommentsController@show')->middleware('isCurrentUser');
Route::get('/editComment/{commentId}', 'CommentsController@edit')->middleware('isAuthenticCommentUpdate');
Route::post('/updateComment', 'CommentsController@update');

// ------------------- ADMIN Routes ----------------- //
// Display Data
Route::get('/users', 'AdminController@displayUsers')->name('users')->middleware('isAdmin');
Route::get('/allposts', 'AdminController@displayPosts')->name('allposts')->middleware('isAdmin');
Route::get('/allcomments', 'AdminController@displayComments')->name('allcomments')->middleware('isAdmin');
Route::get('/allcategories', 'AdminController@displayCategories')->name('allcategories')->middleware('isAdmin');
// CRUD User
Route::get('/deleteUser/{userId}', 'AdminController@destroy')->middleware('isAdmin');
Route::get('/editUser/{userId}', 'AdminController@edit')->middleware('isAdmin');
Route::post('/postUserData', 'AdminController@update')->middleware('isAdmin');
// CRUD Category
Route::get('/editCategory/{categoryId}', 'AdminController@editCategory')->middleware('isAdmin');
Route::get('/deleteCategory/{categoryId}', 'AdminController@destroyCategory')->middleware('isAdmin');
Route::post('/updateCategory', 'AdminController@updateCategory')->middleware('isAdmin');
Route::get('/addCategory', 'AdminController@addCategory')->middleware('isAdmin');
Route::post('/postCategory', 'AdminController@postCategory')->middleware('isAdmin');
