<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTegangan;
use App\Models\Trafo;
use App\Models\TeganganHistory;
use App\Models\Tegangan;

class UserTeganganController extends Controller
{
    public function index()
    {
        $title = 'Monitoring Tegangan';
        $trafo = Trafo::all();
        $tegangan = UserTegangan::latest()->first();
        return view('user.tegangan', compact('title','trafo','tegangan'));
    }
    public function filter_trafo($trafo_id)
    {
        $title = 'Monitoring Suhu dan Tekanan';
        $data_trafo = Trafo::all();

        // Jika tidak ada trafo yang dipilih, trafo pertama sebagai default
        $pilih_trafo = $trafo_id ? Trafo::find($trafo_id) : $data_trafo->first();

        if ($pilih_trafo) {
            $data_arus = UserTegangan::where('trafo_id', $pilih_trafo->id);
    
            $arus = UserTegangan::where('trafo_id', $pilih_trafo->id)->latest()->first();
            
        }else{
            $arus = null;
        }

        return view('user.tegangan', compact('title', 'pilih_trafo', 'data_trafo','data_arus','arus'));
    }
}
