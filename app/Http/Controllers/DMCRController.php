<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trafo;
use App\Models\Suhu;
use App\Models\Tekanan;

class DMCRController extends Controller
{
    public function index()
    {
        $title = 'Monitoring DMCR';
        $trafo = Trafo::all();
        $suhu = Suhu::latest()->first();
        $tekanan = tekanan::latest()->first();
        return view('user.dmcr.index', compact('title', 'trafo','suhu','tekanan'));
    }
    public function filter_trafo($trafo_id)
    {
        $title = 'Monitoring Suhu dan Tekanan';
        $data_trafo = Trafo::all();

        // Jika tidak ada trafo yang dipilih, trafo pertama sebagai default
        $pilih_trafo = $trafo_id ? Trafo::find($trafo_id) : $data_trafo->first();

        if ($pilih_trafo) {
            $data_suhu = Suhu::where('trafo_id', $pilih_trafo->id);
            $data_tekanan = Tekanan::where('trafo_id', $pilih_trafo->id);
    
            $suhu = Suhu::where('trafo_id', $pilih_trafo->id)->latest()->first();
            $tekanan = Tekanan::where('trafo_id', $pilih_trafo->id)->latest()->first();
            
        }else{
            $suhu = null;
            $tekanan = null;
        }

        return view('user.dmcr.index', compact('title', 'pilih_trafo', 'data_trafo','data_suhu','data_tekanan', 'suhu', 'tekanan'));
    }
}
