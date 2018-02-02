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
    $sender = 'sgonzalez@agrobiomexico.org.mx';
    $copia = ['amonteagudo@agrobiomexico.org.mx','mmiron@agrobiomexico.org.mx','jabarranco@grobiomexico.org.mx','cmc2589@gmail.com','matias.correch@bayer.com','martha.nieto@bayer.com','bitia.osorio@bayer.com','francisco.medina1@bayer.com','lesliefranciela.cruzruiz@bayer.com','nicolas.diaz@bayer.com','jsaavedra@dow.com','pfernandez@dow.com','dlugobarrera@dow.com','nfelix@dow.com','manuel.j.bravo@monsanto.com','diana.e.rivera@monsanto.com','eduardo.perez.pico@monsanto.com','karina.rosete@monsanto.com','laura.tamayo@monsanto.com','eva.maria.barbosa@monsanto.com','laura.del.pilar.rivera.guerra@monsanto.com','giovani.medina@monsanto.com','antonieta.tellez@monsanto.com','jesus.m.alcazar@monsanto.com','javier.gandara@monsanto.com','juan.m.de.la.fuente@monsanto.com','luis.adrian.castillo@monsanto.com','nery.n.echeverria@monsanto.com','pablo.lomeli@monsanto.com','rodrigo.ojeda@monsanto.com','jesus.madrazo@monsanto.com','rodrigo.oria@monsanto.com','ricardo.garciadealba@pioneer.com','sandra.pina@pioneer.com','arturo.delucas@pioneer.com','julio.guillen@pioneer.com','david.floresperez@pioneer.com','marianela.palomera@pioneer.com','javier.valdes@syngenta.com','raquel.hernandez@syngenta.com','montserrat.benitez@syngenta.com','patricia.toledo@syngenta.com','Javier.Castellanos@syngenta.com','Esteban.Padilla@syngenta.com','diego.gutierrez-1@syngenta.com','mvaldes001@gmail.com','enlaceam@hotmail.com','pedro.o@hotmail.com','ricardo.calderon@appamex.com.mx','lharo@cna.org.mx','hmpayan@hotmail.com','ruben.chavez.villagran@gmail.com','sarj55@yahoo.com.mx','uarnt@yahoo.com.mx','presidencia@aoass.com','presidencia@caades.org.mx','caclagunera@hotmail.com','aarc@aarc.com.mx','aarcpresidencia@aarc.com.mx','laura.reyes@aarc.com.mx','presidencia@aarfs.com.mx','presidencia@aarsp.com','julisa_presidencia@aarsp.com','lupe305@prodigy.net.mx','octavio_fl61@hotmail.com','mauriciogerardo56@hotmail.com','playon_rob@hotmail.com','tagari_venado@hotmail.com','franciscogonzalo.bolivar@gmail.com','lherrera@ira.cinvestav.mx','aalvarez@ira.cinvestav.mx','mmeraz@cinvestav.mx','b.govaerts@cgiar.org','solleiro@unam.mx','aromero@llorenteycuenca.com','bperez@llorenteycuenca.com','Karenina.opemedios@gmail.com','froylan@opemedios.com.mx'];
        Mail::to($sender)
            ->bcc($copia)
            ->send(new \App\Mail\Blocknews());
    Multiple::where('dispatched', NO_ENVIADO)->update(['dispatched' => ENVIADO]);
    return redirect('/bloque')->with('status', 'Se ha enviado el correo del bloque.');
});
Route::get('/bloque', 'MultipleController@index')->name('bloques');
Route::post('/guardar-link', 'LinkController@store')->name('guardar_link');