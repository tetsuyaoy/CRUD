<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class barangControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brng = barang::latest()->paginate(5);
        return view ('brng.index',compact('brng'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brng.create');
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
            'kd_barang' => 'required',
            'nm_barang' => 'required',
            'tipe' => 'required',
        ]);
        barang::create($request->all());

        return redirect()->route('brng.index')->with('succes','Data Berhasil di Input');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(barang $brng)
    {
        return view('brng.show',compact('brng'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $brng)
    {
        return view('brng.edit', compact('brng'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $brng)
    {
        $request->validate([
            'kd_barang' => 'required',
            'nm_barang' => 'required',
            'tipe' => 'required',
        ]);

        $brng->update($request->all());

        return redirect()->route('brng.index')->with('succes','Barang Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $brng)
    {
        $brng->delete();

        return redirect()->route('brng.index')->with('succes','Barang Berhasil di Hapus');    }
}
