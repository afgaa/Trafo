<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trafo;
use App\Models\TeganganHistory;
use App\Models\Tegangan;


class TeganganController extends Controller
{
    public function index()
    {
        $title = 'Monitoring Tegangan';
        $trafo = Trafo::all();
        $tegangan = Tegangan::latest()->first();
        return view('admin.tegangan', compact('title','trafo','tegangan'));
    }
    public function filter_trafo($trafo_id)
    {
        $title = 'Monitoring Suhu dan Tekanan';
        $data_trafo = Trafo::all();

        // Jika tidak ada trafo yang dipilih, trafo pertama sebagai default
        $pilih_trafo = $trafo_id ? Trafo::find($trafo_id) : $data_trafo->first();

        if ($pilih_trafo) {
            $data_arus = Tegangan::where('trafo_id', $pilih_trafo->id);
    
            $arus = Tegangan::where('trafo_id', $pilih_trafo->id)->latest()->first();
            
        }else{
            $arus = null;
        }

        return view('admin.tegangan', compact('title', 'pilih_trafo', 'data_trafo','data_arus','arus'));
    }
    public function storeTegangan(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'trafo_id' => 'required',
            'topic_name_arus_r' => 'required',
            'topic_name_arus_s' => 'required',
            'topic_name_arus_t' => 'required',
            'arussDataS' => 'required',
            'arusrDataR' => 'required',
            'arustDataT' => 'required',
        ]);
               
        // dd(["topic_name_dmcr2"=>$topic_name_dmcr2,"topic_name_zmpt"=>$topic_name_zmpt,"dmcr2Data"=>$dmcr2Data,"zmptData"=>$zmptData]);

        // Simpan data ke dalam database
         $arusData = TeganganHistory::create([
            'trafo_name' => Trafo::find($validated['trafo_id'])->name,
            'topic_name_r' => $request->input('topic_name_arus_r'),
            'topic_name_s' => $request->input('topic_name_arus_s'),
            'topic_name_t' => $request->input('topic_name_arus_t'),
            'value_r' => $request->input('arusrDataR'),
            'value_s' => $request->input('arussDataS'),
            'value_t' => $request->input('arustDataT')
        ]);
        return response()->json(['message' => 'Data saved successfully']);
    }
}
