<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMultipleRequest;
use App\Multiple;
use Illuminate\Http\Request;

class MultipleController extends Controller
{
    /**
     * cuando la nota no ha sido enviada en un correo 
     */
    const NO_ENVIADO = 0;

    public function create(CreateMultipleRequest $request)
    {
        $nota = Multiple::create([
            'title' => $request->input('title'),
            'link' => $request->input('url'),
            'theme_id' => $request->input('theme'),
            'content' => $request->input('sintesis'),
            'dispatched' => self::NO_ENVIADO
        ]);
        
        return redirect('/bloque');
    }

    public function index()
    {
        $news = Multiple::where('dispatched', self::NO_ENVIADO)->get();
        foreach ($news as $new) {
            $new->theme_id = $this->getThemeById($new->theme_id);
        }
        return view('multiples.index', compact('news'));
    }

    private function getThemeById($id)
    {
        switch ($id) {
            case 1: return 'AgroBIO México';
            case 2: return 'Bayer';
            case 3: return 'Dow';
            case 4: return 'Dupont-Pioneer';
            case 5: return 'Monsanto';
            case 6: return 'Syngenta';
            case 7: return 'Transgénicos';
            case 8: return 'Biotecnología agrícola';
            case 9: return 'Biotecnología';
            case 10: return 'Maíz';
            case 11: return 'Algodón';
            case 12: return 'Soya';
            case 13: return 'Sagarpa';
            case 14: return 'Semarnat';
            case 15: return 'Coparmex';
            case 16: return 'Consejo Coordinador empresarial';
            case 17: return 'Antad';
            case 18: return 'Cimmyt';
            case 19: return 'Cinvestav - IPN';
            case 20: return 'Organizaciones campesinas y productoras agrícolas; CNPAMM, CNC,';
            case 21: return 'Empresas agrícolas:  Cargill, Maseca, Minsa';
            default: return 'Tema no encontrado';
        }
    }
}
