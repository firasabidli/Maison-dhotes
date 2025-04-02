<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProprietaireController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        return view('proprietaire.dashboard');
    }
    public function page2()
    {
        return view('proprietaire.page2');
    }
}
