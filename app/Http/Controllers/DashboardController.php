<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GPS;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Monitoring';
        $gps_trafo = GPS::all();
        return view('admin.dashboard', compact('title', 'gps_trafo'));
    }
}
