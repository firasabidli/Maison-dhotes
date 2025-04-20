<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maison;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(4);

        $maisons = Maison::where('nb_demande', '>', 0)
                         ->orderByDesc('nb_demande')
                         ->paginate(4);
            $noms = Maison::select('id', 'nom')->distinct()->get();
            
        return view('client.home', compact('categories', 'maisons', 'noms'));
    }
    
}

