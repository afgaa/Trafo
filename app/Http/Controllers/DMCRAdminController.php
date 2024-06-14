<?php

namespace App\Http\Controllers;
use App\Exports\SuhuExport;
use App\Exports\TekananExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Trafo;
use App\Models\Suhu;
use App\Models\Tekanan;

class DMCRAdminController extends Controller
{
    public function index()
    {
        $title = 'Monitoring Suhu dan Tekanan';
        $trafo = Trafo::all();
        $suhu = Suhu::latest()->first();
        $tekanan = tekanan::latest()->first();
        return view('admin.dmcr', compact('title','suhu','tekanan'));
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

        return view('admin.dmcr', compact('title', 'pilih_trafo', 'data_trafo','data_suhu','data_tekanan','suhu', 'tekanan'));
    }
    public function export_suhu()
    {
        $suhu = Suhu::all();
        // dd($suhu);
        // return Excel::download('arus', 'arus_xlsx');
    }

    public function storeSuhu(Request $request)
    {
        $trafo_id = $request->input('trafo_id');
        $dmcr1ataArray = $request->input('dmcr1Data');
        $topicNameDmcr = $request->input('topic_name_dmcr1');

        // dd(["topic_name_dmcr2"=>$topic_name_dmcr2,"topic_name_zmpt"=>$topic_name_zmpt,"dmcr2Data"=>$dmcr2Data,"zmptData"=>$zmptData]);

        // Simpan data zmpt
        foreach ($dmcr1DataArray as $zmptData) {
            Tegangan::create([
                'trafo_id' => $trafo_id, // Ganti dengan ID trafo yang sesuai
                'topic_name' => $topicNameDmcr1,
                'value' => $dmcr1Data,
            ]);
        }

        return response()->json(['message' => 'Data saved successfully']);
    }

    public function storeTekanan(Request $request)
    {
        $trafo_id = $request->input('trafo_id');
        $dmcr2DataArray = $request->input('dmcr2Data');
        $topicNameDmcr2 = $request->input('topic_name_dmcr');

        // dd(["topic_name_dmcr2"=>$topic_name_dmcr2,"topic_name_zmpt"=>$topic_name_zmpt,"dmcr2Data"=>$dmcr2Data,"zmptData"=>$zmptData]);

        // Simpan data ke dalam database
        foreach ($dmcr2DataArray as $dmcr2Data) {
            Tegangan::create([
                'trafo_id' => $trafo_id, // Ganti dengan ID trafo yang sesuai
                'topic_name' => $topicNameDmcr2,
                'value' => $dmcr2Data,
            ]);
        }

        return response()->json(['message' => 'Data saved successfully']);
    }

    public function exportSuhu() 
    {
        return Excel::download(new SuhuExport, 'suhu.xlsx');
    }
    public function exportTekanan() 
    {
        return Excel::download(new TekananExport, 'tekanan.xlsx');
    }
}
