<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TeganganExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\GPS;
use App\Models\Arus;
use App\Models\Tegangan;
use App\Models\Trafo;

class MonitoringAdminController extends Controller
{
    public function index()
    {
        $title = 'Monitoring Arus dan Tegangan';
        $trafo = GPS::all();
        $arus = Arus::latest()->first();
        $tegangan = Tegangan::latest()->first();
        return view('admin.monitoring', compact('title','trafo','arus','tegangan'));
    }
    public function filter_trafo($trafo_id)
    {
        // dd($trafo_id);
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

        return view('admin.monitoring', compact('title', 'pilih_trafo', 'data_trafo','data_arus','data_tegangan','arus', 'tegangan'));
    }

    public function export_arus()
    {
        $arus = Arus::all();
        dd($arus);
        // return Excel::download('arus', 'arus_xlsx');
    }

    public function storeTegangan(Request $request)
    {
        $trafo_id = $request->input('trafo_id');
        $zmctDataArray = $request->input('zmctData');
        $zmptDataArray = $request->input('zmptData');
        $topicNameZmct = $request->input('topic_name_zmct');
        $topicNameZmpt = $request->input('topic_name_zmpt');

        // dd(["topic_name_zmct"=>$topic_name_zmct,"topic_name_zmpt"=>$topic_name_zmpt,"zmctData"=>$zmctData,"zmptData"=>$zmptData]);

        // Simpan data ke dalam database
        foreach ($zmctDataArray as $zmctData) {
        Tegangan::create([
            'trafo_id' => $trafo_id, // Ganti dengan ID trafo yang sesuai
            'topic_name' => $topicNameZmct,
            'value' => $zmctData,
        ]);
    }

    // Simpan data zmpt
    foreach ($zmptDataArray as $zmptData) {
        Tegangan::create([
            'trafo_id' => $trafo_id, // Ganti dengan ID trafo yang sesuai
            'topic_name' => $topicNameZmpt,
            'value' => $zmptData,
        ]);
    }

        return response()->json(['message' => 'Data saved successfully']);
    }

    public function exportTegangan() 
    {
        return Excel::download(new TeganganExport, 'tegangan.xlsx');
    }
}
