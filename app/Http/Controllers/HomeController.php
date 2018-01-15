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
    private function getThemes()
    {
        return [
            1 => 'AgroBIO México',
            2 => 'Bayer',
            3 => 'Dow',
            4 => 'Dupont-Pioneer',
            5 => 'Monsanto',
            6 => 'Syngenta',
            7 => 'Transgénicos',
            8 => 'Biotecnología agrícola',
            9 => 'Biotecnología',
            10 => 'Maíz',
            11 => 'Algodón',
            12 => 'Soya',
            13 => 'Sagarpa',
            14 => 'Semarnat',
            15 => 'Coparmex',
            16 => 'Consejo Coordinador empresarial',
            17 => 'Antad',
            18 => 'Cimmyt',
            19 => 'Cinvestav - IPN',
            20 => 'Organizaciones campesinas y productoras agrícolas; CNPAMM, CNC,',
            21 => 'Empresas agrícolas:  Cargill, Maseca, Minsa'
        ];
    }
}
