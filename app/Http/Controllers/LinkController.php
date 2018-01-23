<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Http\Requests\CreateLinkRequest;

class LinkController extends Controller
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

    public function store (CreateLinkRequest $request)
    {
        $link = Link::create([
            'link' => $request->input('url'),
            'type' => $request->input('type'),
        ]);
        
        return redirect('/bloque')->with('status', 'Se guardo el link para ' . $this->getTipo($link->type));
    }

    public static function getTipo($type) 
    {
        switch ($type) {
            case 1:
                return 'Primeras Planas';
            case 2:
                return 'Prortadas Financieras';
            case 3:
                return 'Columnas Políticas';
            case 4:
                return 'Columnas Financieras';
            case 5:
                return 'Cartones';
            
            default:
                return 'No se encontro el tipo que pides.';
        }
    }
}
