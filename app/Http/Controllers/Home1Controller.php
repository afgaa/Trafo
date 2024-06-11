<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home1Controller extends Controller
{
    public function index()
    {
        $title = 'Sistem Monitoring Trafo';
        return view('home1', compact('title'));
    }
}
