<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\NewsletterData;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function showForm () {

        return view('newsletter.create');
    }

    public function create (Request $request) {

        $newsletter = Newsletter::create(['status' => 0]);

        $newsletter->sections()->save(new NewsletterData(['label' => $request->input('label'), 'link' => $request->input('link')]));

        return redirect()->route('newsletter.edit', ['id' => $newsletter->id]);
    }

    public function edit (Request $request, $id) {

        $newsletter = Newsletter::find($id);
        
        return view('newsletter.edit', compact('newsletter'));
    }

    public function update (Request $request, $id) {

        $newsletter = Newsletter::find($id);
        $newsletter->sections()->save(new NewsletterData(['label' => $request->input('label'), 'link' => $request->input('link')]));

        return back()->with('status', 'Se ha agregado la sección con exito.');
    }
}
