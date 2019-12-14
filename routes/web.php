<?php

Route::get('/categories/create', 'Backend\CategoryController@categoriesInsert')->name('category.create');
Route::post('/categories/create', 'Backend\CategoryController@categoriesInsertProcess');

Route::get('/categories', 'Backend\CategoryController@categoriesIndex')->name('categories.all-record-view');
Route::get('/categories/{id}', 'Backend\CategoryController@categoriesShow')->name('categories.single-record-view');

Route::get('/categories/{id}/edit', 'Backend\CategoryController@categoriesEdit')->name('categories.edit');

Route::put('/categories/{id}', 'Backend\CategoryController@categoriesUpdate')->name('categories.update');

Route::get('/categories/{id}/delete', 'Backend\CategoryController@categoriesDestroy')->name('categories.delete');

Route :: resource('/users','Backend\UserController');

Route::get('/','Frontend\BlogController@viewIndex')->name('frontend.blog.view');
Route::get('/blogs-{name}','Frontend\BlogController@viewByCategory')->name('frontend.blog.viewbycategory');
Route::get('/blogs-{name}/{id}','Frontend\BlogController@viewSingleBlog')->name('frontend.blog.viewsingleblog');


Route::name('frontend.')->group(function (){
Route :: resource('/blogs','Frontend\BlogController');
});

Route::name('backend.')->prefix('admin')->group(function (){
  Route :: resource('/blogs','Backend\BlogController');
});
