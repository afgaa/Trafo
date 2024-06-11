<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trafo;
use App\Models\Arus;
use App\Models\Tegangan;


class MonitoringController extends Controller
{
    public function index()
    {
        $title = 'Monitoring Arus dan Tekanan';
        $trafo = Trafo::all();
        $arus = Arus::latest()->first();
        $tegangan = Tegangan::latest()->first();
        return view('user.monitoring.index', compact('title','trafo','arus','tegangan'));
    }
    public function filter_trafo($trafo_id)
    {
        $title = 'Monitoring Arus dan Tegangan';
        $data_trafo = Trafo::all();

        // Jika tidak ada trafo yang dipilih, trafo pertama sebagai default
        $pilih_trafo = $trafo_id ? Trafo::find($trafo_id) : $data_trafo->first();

        if ($pilih_trafo) {
            $data_arus = Arus::where('trafo_id', $pilih_trafo->id);
            $data_tegangan = Tegangan::where('trafo_id', $pilih_trafo->id);
    
            $arus = Arus::where('trafo_id', $pilih_trafo->id)->latest()->first();
            $tegangan = Tegangan::where('trafo_id', $pilih_trafo->id)->latest()->first();

        }else{
            $arus = null;
            $tegangan = null;
        }

        return view('user.monitoring.index', compact('title', 'pilih_trafo', 'data_trafo','data_arus','data_tegangan','arus', 'tegangan'));
    }
}
