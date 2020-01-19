<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\NewsletterConfig;
use App\NewsletterData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function config () {

        $config = NewsletterConfig::all()->last();

        return view('newsletter.config', compact('config'));
    }

    public function configUpdate (Request $request) {
        
        if($request->has('id')) {
            $config = NewsletterConfig::find($request->input('id'));
            $config->emails = $request->input('emails');
            $config->save();
        } else {
            $file = $request->file('banner')->store('banners');

            NewsletterConfig::create([
                'emails' => $request->input('emails'),
                'banner' => $file
            ]);
        }


        return redirect()->route('home')->with('status', 'Configuración establecida');
    }

    public function configUpdateBanner(Request $request) {
        $config = NewsletterConfig::find($request->input('id'));
        
        try {
            if(Storage::exists($config->banner)) {
                Storage::delete($config->banner);
            } 
            
            $config->banner = $request->file('banner')->store('banners');
            $config->save();
            
        } catch (Exception $e) {
            return back()->with('status', 'Could not update image: ' . $e->getMessage());
        }

        return back()->with('status', 'Se ha cambiado el banner');
    }
}
