<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMultipleRequest;
use App\Multiple;
use App\Link;
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
        $primerasP = $columnasF = $columnasP = $cartones = $portadas = false;
        $linkPrimeras = $linkPortadas = $linkColumnas = $linkColumnasF = $linkCartones = '#';
        $links = Link::where('created_at', 'like', date('Y-m-d') . '%')->get();

        foreach ($links as $link) {
            if($link->type == 1){
                $primerasP = true;
                $linkPrimeras = $link->link;
            }
            if($link->type == 2){
                $portadas = true;
                $linkPortadas = $link->link;
            }
            if($link->type == 3){
                $columnasP = true;
                $linkColumnas = $link->link;
            }
            if($link->type == 4){
                $columnasF = true;
                $linkColumnasF = $link->link;
            }
            if($link->type == 5){
                $cartones = true;
                $linkCartones = $link->link;
            }

        }
        
        $news = Multiple::where('dispatched', self::NO_ENVIADO)->get();
        foreach ($news as $new) {
            $new->theme_id = $this->getThemeById($new->theme_id);
        }
        $today = $this->getTodayAttribute()->format('l d, F Y');
        $newsSorted = $this->sortNews($news);
        return view('multiples.index', compact('news', 'today', 'newsSorted', 'primerasP', 'columnasF', 'columnasP', 'cartones', 'portadas', 'linkPrimeras', 'linkPortadas', 'linkColumnas', 'linkColumnasF', 'linkCartones'));
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
            case 3: return 'Dow - Pioneer';
            case 4: return 'Monsanto';
            case 5: return 'Syngenta';
            case 6: return 'Agricultura';
            case 7: return 'Transgénicos';
            case 8: return 'Organismos genéticamente modificados';
            case 9: return 'Biotecnología agrícola';
            case 10: return 'Biotecnología modera';
            case 11: return 'Maíz';
            case 12: return 'Algodón';
            case 13: return 'Soya';
            case 14: return 'Tortilla';
            case 15: return 'Bioseguridad';
            case 16: return 'Ingeniería genética';
            case 17: return 'Edición genómica';
            case 18: return 'CIBIOGEM';
            case 19: return 'TLCAN';
            case 20: return 'NAFTA';
            case 21: return 'Consejo Nacional Agropecuario';
            default: return 'Tema no encontrado';
        }
    }
}
