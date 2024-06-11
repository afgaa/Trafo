<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trafo;

class TrafoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Trafo';
        $trafo = Trafo::all();
        $paginate = Trafo::orderBy('id', 'asc')->paginate(5);

        return view('admin.trafo.index',
            compact('trafo', 'paginate', 'title')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Trafo';
        $trafo = Trafo::all();
        return view('admin.trafo.create', compact('trafo', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'trafo_name' => 'required',
            'arus_topic_name' => 'required',
            'tegangan_topic_name' => 'required',
            'suhu_topic_name' => 'required',
            'tekanan_topic_name' => 'required',
        ]);

        $trafo = Trafo::create([
            'name' => $request->trafo_name,
        ]);

        $trafo->arus()->create([
            'topic_name' => $request->arus_topic_name,
        ]);

        $trafo->suhu()->create([
            'topic_name' => $request->suhu_topic_name,
        ]);

        $trafo->tegangan()->create([
            'topic_name' => $request->tegangan_topic_name,
        ]);

        $trafo->tekanan()->create([
            'topic_name' => $request->tekanan_topic_name,
        ]);

        return redirect()->route('trafo.index')->with('success', 'Data Trafo Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data Trafo';
        $trafo = Trafo::find($id);
        return view('admin.trafo.update', compact('trafo', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'trafo_name' => 'required',
            'arus_topic_name' => 'required',
            'tegangan_topic_name' => 'required',
            'suhu_topic_name' => 'required',
            'tekanan_topic_name' => 'required',
        ]);

        $trafo = Trafo::find($id);

        
        $trafo->update([
            'name' => $request->trafo_name,
        ]);

        $trafo->arus()->update([
            'topic_name' => $request->arus_topic_name,
        ]);

        $trafo->suhu()->update([
            'topic_name' => $request->suhu_topic_name,
        ]);

        $trafo->tegangan()->update([
            'topic_name' => $request->tegangan_topic_name,
        ]);

        $trafo->tekanan()->update([
            'topic_name' => $request->tekanan_topic_name,
        ]);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('trafo.index')->with('success', 'Data Trafo Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trafo::where('id', $id)->delete();
        return redirect()->route('trafo.index')->with('success', 'Data Trafo Berhasil Dihapus');
    }
}
