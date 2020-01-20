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
}
