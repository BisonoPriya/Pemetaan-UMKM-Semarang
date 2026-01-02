<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriUMKM;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $kategori = KategoriUMKM::all();
     return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nama_kategori' => 'required']);
        KategoriUMKM::create($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $kategori = KategoriUMKM::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
               $request->validate(['nama_kategori' => 'required']);
        KategoriUMKM::findOrFail($id)->update($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      KategoriUMKM::destroy($id);
        return back()->with('success','Kategori dihapus');
    }
}
