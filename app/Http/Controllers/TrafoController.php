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
         // Validate the request
        $validated = $request->validate([
            'trafo_name' => 'required',
            'arus_topic_name_r' => 'required',
            'arus_topic_name_s' => 'required',
            'arus_topic_name_t' => 'required',
            'tegangan_topic_name_r' => 'required',
            'tegangan_topic_name_s' => 'required',
            'tegangan_topic_name_t' => 'required',
            'suhu_topic_name' => 'required',
            'tekanan_topic_name' => 'required',
        ]);
        // dd($validated);

        // Create a new trafo
        $trafo = Trafo::create([
            'name' => $validated['trafo_name'],
        ]);

        // Create arus data for R, S, T phases
        $trafo->arus()->create([
            'topic_name_r' => $validated['arus_topic_name_r'],
            'topic_name_s' => $validated['arus_topic_name_s'],
            'topic_name_t' => $validated['arus_topic_name_t'],
        ]);

        // Create tegangan data for R, S, T phases
        $trafo->tegangan()->create([
            'topic_name_r' => $validated['tegangan_topic_name_r'],
            'topic_name_s' => $validated['tegangan_topic_name_s'],
            'topic_name_t' => $validated['tegangan_topic_name_t'],
        ]);

        // Create suhu data
        $trafo->suhu()->create([
            'topic_name' => $validated['suhu_topic_name'],
        ]);

        // Create tekanan data
        $trafo->tekanan()->create([
            'topic_name' => $validated['tekanan_topic_name'],
        ]);

        // Redirect with success message
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
        'arusr_topic_name' => 'required',
        'aruss_topic_name' => 'required',
        'arust_topic_name' => 'required',
        'teganganr_topic_name' => 'required',
        'tegangans_topic_name' => 'required',
        'tegangant_topic_name' => 'required',
        'suhu_topic_name' => 'required',
        'tekanan_topic_name' => 'required',
    ]);

    $trafo = Trafo::find($id);

    if (!$trafo) {
        return redirect()->back()->withErrors(['message' => 'Trafo not found']);
    }

    $trafo->update([
        'name' => $validated['trafo_name'],
    ]);

    // Update arus data for R, S, T phases
    $trafo->arus()->updateOrCreate(
        ['trafo_id' => $trafo->id],
        [
            'topic_name_r' => $validated['arusr_topic_name'],
            'topic_name_s' => $validated['aruss_topic_name'],
            'topic_name_t' => $validated['arust_topic_name'],
        ]
    );

    // Update suhu data
    $trafo->suhu()->updateOrCreate(
        ['trafo_id' => $trafo->id],
        ['topic_name' => $validated['suhu_topic_name']]
    );

    // Update tegangan data for R, S, T phases
    $trafo->tegangan()->updateOrCreate(
        ['trafo_id' => $trafo->id],
        [
            'topic_name_r' => $validated['teganganr_topic_name'],
            'topic_name_s' => $validated['tegangans_topic_name'],
            'topic_name_t' => $validated['tegangant_topic_name'],
        ]
    );

    // Update tekanan data
    $trafo->tekanan()->updateOrCreate(
        ['trafo_id' => $trafo->id],
        ['topic_name' => $validated['tekanan_topic_name']]
    );

    // Redirect with success message
    return redirect()->route('trafo.index')->with('success', 'Data Trafo Berhasil Diperbarui');
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
