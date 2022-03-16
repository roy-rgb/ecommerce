<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');

route::group(['prefix' => 'products' ],function(){

Route::get('/', 'Frontend\ProductsController@index')->name('products');
Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
Route::get('/new/search', 'Frontend\PagesController@search')->name('search');

   //category routes


Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
Route::get('/category/{id}', 'Frontend\CategoriesController@show')->name('categories.show');

});


              // admin routes
    route::group(['prefix' => 'admin' ],function(){
    Route::get('/','Backend\PagesController@index')->name('admin.index');
  
            //  Product Routes
         route::group(['prefix' => '/products' ],function(){
          
      
         Route::get('/','Backend\ProductsController@index')->name('admin.products');    
         Route::get('/create','Backend\ProductsController@create')->name('admin.product.create');
         Route::get('/edit/{id}','Backend\ProductsController@edit')->name('admin.product.edit'); 
         Route::post('/store','Backend\ProductsController@store')->name('admin.product.store');
         Route::post('/edit/{id}','Backend\ProductsController@update')->name('admin.product.update');
         Route::post('/delete/{id}','Backend\ProductsController@delete')->name('admin.product.delete');

    });

             //category Routes

              route::group(['prefix' => '/categories' ],function(){
          
      
              Route::get('/','Backend\categoriesController@index')->name('admin.categories');    
              Route::get('/create','Backend\categoriesController@create')->name('admin.category.create');
              Route::get('/edit/{id}','Backend\categoriesController@edit')->name('admin.category.edit'); 
              Route::post('/store','Backend\categoriesController@store')->name('admin.category.store');
              Route::post('/category/edit/{id}','Backend\categoriesController@update')->name('admin.category.update');
              Route::post('/category/delete/{id}','Backend\categoriesController@delete')->name('admin.category.delete');
     
         });





              //brand Routes

              route::group(['prefix' => '/brands' ],function(){
          
      
               Route::get('/','Backend\BrandsController@index')->name('admin.brands');    
               Route::get('/create','Backend\BrandsController@create')->name('admin.brand.create');
               Route::get('/edit/{id}','Backend\BrandsController@edit')->name('admin.brand.edit'); 
               Route::post('/store','Backend\BrandsController@store')->name('admin.brand.store');
               Route::post('/brand/edit/{id}','Backend\BrandsController@update')->name('admin.brand.update');
               Route::post('/brand/delete/{id}','Backend\BrandsController@delete')->name('admin.brand.delete');
      
          });


          
          route::group(['prefix' => '/divisions' ],function(){
          
      
               Route::get('/','Backend\DivisionsController@index')->name('admin.divisions');    
               Route::get('/create','Backend\DivisionsController@create')->name('admin.division.create');
               Route::get('/edit/{id}','Backend\DivisionsController@edit')->name('admin.division.edit'); 
               Route::post('/store','Backend\DivisionsController@store')->name('admin.division.store');
               Route::post('/division/edit/{id}','Backend\DivisionsController@update')->name('admin.division.update');
               Route::post('/division/delete/{id}','Backend\DivisionsController@delete')->name('admin.division.delete');
      
          });


          route::group(['prefix' => '/districts' ],function(){
          
      
               Route::get('/','Backend\DistrictsController@index')->name('admin.districts');    
               Route::get('/create','Backend\DistrictsController@create')->name('admin.district.create');
               Route::get('/edit/{id}','Backend\DistrictsController@edit')->name('admin.district.edit'); 
               Route::post('/store','Backend\DistrictsController@store')->name('admin.district.store');
               Route::post('/district/edit/{id}','Backend\DistrictsController@update')->name('admin.district.update');
               Route::post('/district/delete/{id}','Backend\DistrictsController@delete')->name('admin.district.delete');
      
          });






 

  });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
