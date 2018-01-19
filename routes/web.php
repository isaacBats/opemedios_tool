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
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/insertar-nota', 'HomeController@formNote')->name('form_nota');
Route::post('/insertar-nota', 'MultipleController@create')->name('create_nota');
Route::get('/enviar-correo', function() {
    $users = ['klonate@gmail.com'];
    foreach ($users as $user) {
        Mail::to($user)
            ->send(new \App\Mail\Blocknews());
    }
});
Route::get('/bloque', 'MultipleController@index')->name('bloques');