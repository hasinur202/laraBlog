<?php

//User Routes
Route::group(['namespace' => 'User'], function(){
    Route::get('/','HomeController@index');
    Route::get('post/{post}', 'PostController@post')->name('post');

    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category');

    //vue routes
    Route::post('getPosts','PostController@getAllPosts');
    Route::post('saveLike','PostController@saveLike');
    
});


//Admin Routes
Route::group(['namespace' => 'Admin'], function(){
    Route::get('admin/home','HomeController@index')->name('admin.home');

    // Users route
    Route::resource('admin/user','UserController');
    // Posts route
    Route::resource('admin/post','PostController');
    // Tags route
    Route::resource('admin/tag','TagController');
    // Categories route
    Route::resource('admin/category','CategoryController');
    // Roles route
    Route::resource('admin/role','RoleController');
    // Permissions route
    Route::resource('admin/permission','PermissionController');
    //Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('admin-login','Auth\LoginController@login');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
