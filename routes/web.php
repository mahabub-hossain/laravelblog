<?php


Route::get('admin/home', function () {

});
Route::get('/admin/home','Admin\homeController@index');
Route::get('/','User\homeController@index');
Route::get('post/{slug}','User\postController@showpost')->name('post');
Route::get('post/tag/{tag}','User\homeController@tag');
Route::get('post/category/{category}','User\homeController@category');

//admin auth Controller

Route::get('/admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('adminlog');
Route::post('/admin-login', 'Admin\Auth\LoginController@login')->name('adminlog');

//Route::get('/admin-login', 'admin\Auth\LoginController@showLoginForm');
//Route::post('/admin-login', 'Auth\LoginController@login');





//post options
Route::get('/create-post','Admin\postController@create');
Route::post('/save-post','Admin\postController@store');
Route::get('/manage-post','Admin\postController@managePost');
Route::get('/edit-post/{id}','Admin\postController@editPost');
Route::post('/update-post/{id}','Admin\postController@update');
Route::get('/remove-post/{id}','Admin\postController@removePost');


//category options
Route::get('/create-category','Admin\categoryController@create');
Route::post('/save-category','Admin\categoryController@store');
Route::get('/manage-category','Admin\categoryController@manageCategory');
Route::get('/edit-category/{id}','Admin\categoryController@editCategory');
Route::post('/update-category/{id}','Admin\categoryController@update');
Route::get('/remove-category/{id}','Admin\categoryController@removeCategory');

//tag options
Route::get('/create-tag','Admin\tagController@create');
Route::get('/create-menu','Admin\tagController@createmenu');
Route::post('/save-tag','Admin\tagController@store');
Route::get('/manage-tag','Admin\tagController@manageTag');
Route::get('/edit-tag/{id}','Admin\tagController@editTag');
Route::post('/update-tag/{id}','Admin\tagController@update');
Route::get('/remove-tag/{id}','Admin\tagController@removeTag');

//User Options
Route::get('/create-user','Admin\userController@createUser');
Route::post('/save-user','Admin\userController@saveUser');
Route::get('/manage-user','Admin\userController@manageUser');
Route::get('/edit-user/{id}','Admin\userController@editUser');
Route::post('/update-user/{id}','Admin\userController@updateUser');
Route::get('/remove-user/{id}','Admin\userController@removeUser');

//vue Route
Route::post('/getPosts','User\postController@getAllposts');



//resource controller Practice

Route::resource('admin/role','Admin\roleController');
Route::resource('admin/permission','Admin\permissionController');


//Route::resource('admin/post','Admin\postController');
//Route::resource('admin/category','Admin\categoryController');
//Route::resource('admin/tag','Admin\tagController');















// alternate way group kore rakhte

//Route::group(['namespace'=>'Admin'],function(){
//    Route::resource('admin/post','postController');
//    Route::resource('admin/category','categoryController');
//    Route::resource('admin/tag','tagController');
//});

//category options
//Route::get('/create-category','SuperadminController@createcategory');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
