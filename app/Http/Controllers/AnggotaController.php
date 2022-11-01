<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ekskul;
use App\Models\Peran;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['anggotas'] = Anggota::all();

        return view('anggotas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['perans'] = Peran::all();
        $data['ekskuls'] = Ekskul::all();

        return view('anggotas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'ekskul_id' => 'required',
            'peran_id' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')->with('info', [
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
    public function edit($id)
    {
        $data['anggotas'] = Anggota::find($id);
        return view('anggotas.edit', $data);
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
        $request->validate([
            'nis' => 'required',
            'ekskul_id' => 'required',
            'peran_id' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $anggota = Anggota::find($id);
        $anggota->update($request->all());

        return redirect()->route('anggota.index')->with('info', [
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
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('info', [
            'message' => 'Data berhasil dihapus',
            'type' => 'success'
        ]);
    }
}