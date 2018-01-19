<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMultipleRequest;
use App\Multiple;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class MultipleController extends Controller
{
    /**
     * cuando la nota no ha sido enviada en un correo 
     */
    const NO_ENVIADO = 0;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $today = $this->getTodayAttribute()->format('l d, F Y');
        $newsSorted = $this->sortNews($news);
        return view('multiples.index', compact('news', 'today', 'newsSorted'));
    }

    public static function sortNews($news)
    {
        $sorted = array();
        foreach ($news as $new) {
            if (!key_exists($new->theme_id, $sorted)) {
                $sorted[$new->theme_id][] = $new;
            } else {
                $sorted[$new->theme_id][] = $new;
            }
        }
        $themes = HomeController::getThemes();

        foreach ($themes as $t) {
            if (!key_exists($t, $sorted)) {
                $sorted[$t] = 'El día de hoy no se reportaron notas.';
            }
        }
        
        return $sorted;
    }

    public function sendMail()
    {
        echo 'Se ha enviado el correo';
    }

    public static function getTodayAttribute()
    {
        return new Date();
    }

    public static function getThemeById($id)
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
