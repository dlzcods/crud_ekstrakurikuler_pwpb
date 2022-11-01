<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ekskuls'] = Ekskul::all();

        return view('ekskuls.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ekskuls.create');
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
            'nama' => 'required',
            'kategori' => 'required',
            'nama_pembina' => 'required'
        ]);

        Ekskul::create($request->all());

        return redirect()->route('ekskul.index')->with('info', [
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
        $data['ekskul'] = Ekskul::find($id);

        return view('ekskuls.edit', $data);
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
            'nama' => 'required',
            'kategori' => 'required',
            'nama_pembina' => 'required'
        ]);

        $ekskul = Ekskul::find($id);
        $ekskul->update($request->all());

        return redirect()->route('ekskul.index')->with('info', [
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
        $ekskul = Ekskul::find($id);
        $ekskul->delete();

        return redirect()->route('ekskul.index')->with('info', [
            'message' => 'Data berhasil dihapus!',
            'type' => 'success'
        ]);
    }
}
