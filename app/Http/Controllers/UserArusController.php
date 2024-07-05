<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trafo;
use App\Models\UserArus;
use App\Models\Arus;

class UserArusController extends Controller
{
    public function index()
    {
        $title = 'Monitoring Arus';
        $trafo = Trafo::all();
        $arus = Arus::latest()->first();
        
        return view('user.arus', compact('title','trafo','arus'));
    }
    public function filter_trafo($trafo_id)
    {
        $title = 'Monitoring Suhu dan Tekanan';
        $data_trafo = Trafo::all();

        // Jika tidak ada trafo yang dipilih, trafo pertama sebagai default
        $pilih_trafo = $trafo_id ? Trafo::find($trafo_id) : $data_trafo->first();

        if ($pilih_trafo) {
            $data_arus = Arus::where('trafo_id', $pilih_trafo->id);
    
            $arus = Arus::where('trafo_id', $pilih_trafo->id)->latest()->first();
            
        }else{
            $arus = null;
        }

        return view('user.arus', compact('title', 'pilih_trafo', 'data_trafo','data_arus','arus'));
    }
}