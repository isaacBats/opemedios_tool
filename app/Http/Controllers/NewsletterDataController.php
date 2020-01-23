<?php

namespace App\Http\Controllers;

use App\NewsletterData;
use Illuminate\Http\Request;

class NewsletterDataController extends Controller
{
    public function update (Request $request, $id) {
        NewsletterData::where('id', $id)
            ->update(['label' => $request->input('label'), 'link' => $request->input('link')]);


        return back()->with('status', "La seccion se actualizo con exito!");
    }

    public function delete (Request $request, $id) {

        $meta = NewsletterData::find($id);
        $name = $meta->label;
        $meta->delete();


        return back()->with('status', "La seccion {$name} se ha eliminado satisfactoriamente!");
    }
}
