<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function page2()
    {
        return view('admin.page2');
    }
}
