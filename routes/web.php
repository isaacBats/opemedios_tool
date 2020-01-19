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
use App\Multiple;
use Illuminate\Support\Facades\Mail;

const NO_ENVIADO = 0;
const ENVIADO = 1;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'newsletter', 'middleware' => ['auth',]], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('nuevo', 'NewsletterController@showForm')->name('newsletter.create');
    Route::post('nuevo', 'NewsletterController@create')->name('newsletter.create');
    Route::get('editar/{id}', 'NewsletterController@edit')->name('newsletter.edit');
    Route::post('editar/{id}', 'NewsletterController@update')->name('newsletter.update');
    
    Route::get('configuracion', 'NewsletterController@config')->name('newsletter.config');
    Route::post('configuracion', 'NewsletterController@configUpdate')->name('newsletter.config');
    Route::post('configuracion/update/banner', 'NewsletterController@configUpdateBanner')->name('newsletter.config.banner');
    // Route::get('/insertar-nota', 'HomeController@formNote')->name('form_nota');
    // Route::post('/insertar-nota', 'MultipleController@create')->name('create_nota');
    // Route::get('/enviar-correo', function() {
        
    // });
    // Route::get('/bloque', 'MultipleController@index')->name('bloques');
    // Route::post('/guardar-link', 'LinkController@store')->name('guardar_link');
});