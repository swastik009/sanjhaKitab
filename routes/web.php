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

Route::get('/', function () {

    return view('test');
})->name('Welcome')->middleware('guest');

Auth::routes();



//public controller

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/purchases','PublicControllers\PurchaseController@index')->name('purchases');
Route::get('/books','PublicControllers\PublicBookController@index')->name('booksPublic');
Route::post('/books/ConfirmCheckOut','PublicControllers\PurchaseController@ConfirmCheckOut')->name('ConfirmCheckOut');
Route::get('/books/checkout','PublicControllers\PurchaseController@Checkout')->name('checkout');
Route::get('/books/{book}','PublicControllers\PublicBookController@show')->name('showPublicBook');
Route::get('/books/{book}/add_to_cart','PublicControllers\PublicBookController@AddToCart')->name('add_to_cart');
Route::delete('/books/delete/{book}','PublicControllers\PublicBookController@destroy')->name('DeleteBooks');


//Social Site Login
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');



Route::prefix('admin')->group(function (){

    Route::get('/','AdminController@index')->name('adminDashBoard');
    Route::resource('users','UserController',['names'=>
                   [
                       'index'=>'users',
                       'create'=>'usersCreate',
                       'store'=>'usersStore',
                       'show' =>'usersShow',
                       'edit'=> 'usersEdit',
                       'update'=> 'usersUpdate',
                       'destroy'=>'usersDelete'
                   ]
                ]);
    Route::get('/login','Auth\AdminLoginController@login')->name('login.form');
    Route::post('/login','Auth\AdminLoginController@loginSubmit')->name('login.form.submit');


    Route::resource('books','BooksController',['names'=>
                   ['index'=>'books',
                       'create'=>'booksCreate',
                       'store'=>'booksStore',
                       'show' =>'booksShow',
                       'edit'=> 'booksEdit',
                       'update'=> 'booksUpdate',
                       'destroy'=>'booksDelete'
                   ]
                   ]);

    Route::post('/books/featured_toggle/{book}','BooksController@FeaturedToggle')->name('FeaturedToggle');

});

