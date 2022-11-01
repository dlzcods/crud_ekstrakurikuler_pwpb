<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Ekskul;
use App\Models\Peran;
use App\Models\Keanggotaan;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ekskul_id)
    {
        $data['ekskul'] = Ekskul::find($ekskul_id);
        $data['anggotas'] = $data['ekskul']->anggotas;

        return view('anggotas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ekskul_id)
    {
        $data['perans'] = Peran::all();
        $data['siswas'] = Siswa::all();
        $data['ekskul'] = Ekskul::find($ekskul_id);

        return view('anggotas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ekskul_id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'ekskul_id' => 'required',
            'peran_id' => 'required',
        ]);

        Keanggotaan::create($request->all());

        return redirect()->route('anggota.index', $ekskul_id)->with('info', [
            'message' => 'Data berhasil ditambahkan!',
            'type' => 'success'
        ]);
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
    public function edit($ekskul_id, $siswa_id)
    {
        $data['perans'] = Peran::all();
        $data['ekskul'] = Ekskul::find($ekskul_id);
        $data['siswa'] = $data['ekskul']->anggotas()->wherePivot('siswa_id', $siswa_id)->first();

        return view('anggotas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ekskul_id, $siswa_id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'ekskul_id' => 'required',
            'peran_id' => 'required',
        ]);

        $anggota = Keanggotaan::firstWhere([
            'ekskul_id' => $ekskul_id,
            'siswa_id' => $siswa_id
        ]);
        $anggota->update($request->all());

        return redirect()->route('anggota.index', $ekskul_id)->with('info', [
            'message' => 'Data berhasil diubah!',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ekskul_id, $siswa_id)
    {
        $anggota = Keanggotaan::firstWhere([
            'ekskul_id' => $ekskul_id,
            'siswa_id' => $siswa_id
        ]);
        $anggota->delete();

        return redirect()->route('anggota.index', $ekskul_id)->with('info', [
            'message' => 'Data berhasil dihapus',
            'type' => 'success'
        ]);
    }
}
