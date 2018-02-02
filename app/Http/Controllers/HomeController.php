<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for insert a new Note.
     *
     * @return \Illuminate\Http\Response
     */
    public function formNote()
    {
        $themes = $this->getThemes();
        return view('home.formNote', compact('themes'));
    }

    /**
     * Get all themes default
     * @return array 
     */
    public static function getThemes()
    {
        return [
            1 => 'AgroBIO México',
            2 => 'Bayer',
            3 => 'Dow - Pioneer',
            4 => 'Monsanto',
            5 => 'Syngenta',
            6 => 'Agricultura',
            7 => 'Transgénicos',
            8 => 'Organismos genéticamente modificados',
            9 => 'Biotecnología agrícola',
            10 => 'Biotecnología modera',
            11 => 'Maíz',
            12 => 'Algodón',
            13 => 'Soya',
            14 => 'Tortilla',
            15 => 'Bioseguridad',
            16 => 'Ingeniería genética',
            17 => 'Edición genómica',
            18 => 'CIBIOGEM',
            19 => 'TLCAN',
            20 => 'NAFTA',
            21 => 'Consejo Nacional Agropecuario'
        ];
    }
}
