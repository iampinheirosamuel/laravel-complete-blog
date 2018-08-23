<?php

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

Route::get('/',[
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);

Route::get('/test', function () {
    return App\User::find(1)->profile;
});

Route::get('/results', function(){
     $posts = \App\Post::where('title','like','%'. request('query') . '%')->get();
     
     return view('results')->with('posts', $posts)
               ->with('title', 'Search results :'. request('query'))
               ->with('settings', \App\Setting::first())
               ->with('query', request('query'))
               ->with('categories', \App\Category::all()->take(6));
});

Route::get('/post/{slug}',[
     'uses' => 'FrontEndController@singlePost',
     'as' => 'post.single'
]);

Route::get('/category/{id}',[
     'uses' => 'FrontEndController@category',
     'as' => 'category'
]);

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

        Route::get('/home', [
            'uses' => 'HomeController@index',
            'as' => 'post.home'
        ]);


        // Post Resource
        Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'post.create'
        ]);

        Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as' => 'post.store'
        ]);

         Route::get('/posts', [
        'uses' => 'PostController@index',
        'as' => 'post.index'
        ]);

         Route::get('/post/edit/{id}', [
        'uses' => 'PostController@edit',
        'as' => 'post.edit'
        ]);

         Route::get('/post/delete/{id}', [
        'uses' => 'PostController@destroy',
        'as' => 'post.delete'
        ]);

        Route::get('/post/trashed', [
        'uses' => 'PostController@trashed',
        'as' => 'post.trashed'
        ]);

        Route::get('/post/kill/{id}', [
        'uses' => 'PostController@kill',
        'as' => 'post.kill'
        ]);

        Route::get('/post/restore/{id}', [
        'uses' => 'PostController@restore',
        'as' => 'post.restore'
        ]);



        // Category Resource
        Route::post('/categories/store', [
        'uses' => 'Categories@store',
        'as' => 'categories.store'
        ]);

        Route::get('/categories/create', [
        'uses' => 'Categories@create',
        'as' => 'category.create'
        ]);

        Route::get('/categories', [
        'uses' => 'Categories@index',
        'as' => 'categories'
        ]);

        Route::get('/categories/edit/{id}', [
        'uses' => 'Categories@edit',
        'as' => 'category.edit'
        ]);


        Route::get('/categories/delete/{id}', [
        'uses' => 'Categories@destroy',
        'as' => 'category.delete'
        ]);

        Route::post('/categories/update/{id}', [
        'uses' => 'Categories@update',
        'as' => 'category.update'
        ]);

        // Tag Resource
        Route::get('/tag/create', [
        'uses' => 'TagController@create',
        'as' => 'tag.create'
        ]);

        Route::post('/tag/store', [
        'uses' => 'TagController@store',
        'as' => 'tag.store'
        ]);

         Route::get('/tags', [
        'uses' => 'TagController@index',
        'as' => 'tags'
        ]);

         Route::get('/tag/edit/{id}', [
        'uses' => 'TagController@edit',
        'as' => 'tag.edit'
        ]);

        Route::post('/tag/update/{id}', [
        'uses' => 'TagController@update',
        'as' => 'tag.update'
        ]);

         Route::get('/tag/delete/{id}', [
        'uses' => 'TagController@destroy',
        'as' => 'tag.delete'
        ]);



        //Users
        Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
        ]);

        Route::get('/users/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
        ]);

        Route::post('/users/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
        ]);

        Route::get('/users/isadmin/{id}', [
        'uses' => 'UsersController@isAdmin',
        'as' => 'user.isAdmin'
        ]);

         Route::get('/users/admin/{id}', [
        'uses' => 'UsersController@notAdmin',
        'as' => 'user.notAdmin'
        ]);

        Route::get('/user/edit/{id}', [
        'uses' => 'UsersController@edit',
        'as' => 'user.edit'
        ]);

        //  Route::get('/user/update/{id}', [
        // 'uses' => 'UsersController@update',
        // 'as' => 'user.update'
        // ]);

         Route::get('/admin/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.destroy'
        ]);

         Route::get('/user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
        ]);

         Route::get('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
        ]);

        //Settings
        Route::get('/site/settings',[
        'uses' => 'SettingController@index',
        'as' => 'settings'
        ]);

         Route::post('/site/settings/update',[
        'uses' => 'SettingController@update',
        'as' => 'settings.update'
        ]);

});


