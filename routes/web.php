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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/insertar-nota', 'HomeController@formNote')->name('form_nota');
Route::post('/insertar-nota', 'MultipleController@create')->name('create_nota');
Route::get('/enviar-correo', function() {
    $users = ['klonate@gmail.com', 'sgonzalez@agrobiomexico.org.mx', 'Karenina.opemedios@gmail.com', 'amonteagudo@agrobiomexico.org.mx', 'froylan@opemedios.com.mx'];
    // $users = ['froylan@opemedios.com.mx','Karenina.opemedios@gmail.com','klonate@gmail.com'];
    foreach ($users as $user) {
        Mail::to($user)
            ->send(new \App\Mail\Blocknews());
    }
    Multiple::where('dispatched', NO_ENVIADO)->update(['dispatched' => ENVIADO]);
    return redirect('/bloque')->with('status', 'Se ha enviado el correo del bloque.');
});
Route::get('/bloque', 'MultipleController@index')->name('bloques');
Route::post('/guardar-link', 'LinkController@store')->name('guardar_link');