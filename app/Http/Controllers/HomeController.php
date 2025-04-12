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

        $maisons = Maison::with('categorie')
            ->paginate(4);

        return view('client.home', compact('categories', 'maisons'));
    }
}

