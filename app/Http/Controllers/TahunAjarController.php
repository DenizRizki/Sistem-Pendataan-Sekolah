<?php

namespace App\Http\Controllers;

use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    public function index()
    {
       $data = TahunAjar::orderBy('kode_tahun_ajar', 'DESC')->paginate(10);
        return view('admin.tahun-ajar.index', compact('data'));
    }

    public function create()
    {
        return view('admin.tahun-ajar.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'kode_tahun_ajar'  => 'required|unique:tahun_ajars',
        'nama_tahun_ajar'  => 'required',
        'semester'         => 'required|in:ganjil,genap',
    ]);

    TahunAjar::create($request->all());

    return redirect()->route('admin.tahun-ajar.index')
                     ->with('success', 'Tahun ajar berhasil ditambahkan');
}

    public function edit($id)
{
    $data = TahunAjar::findOrFail($id);
    return view('admin.tahun-ajar.edit', compact('data'));
}


    public function update(Request $request, $id)
{
    $data = TahunAjar::findOrFail($id);

    $request->validate([
        'kode_tahun_ajar' => 'required|unique:tahun_ajars,kode_tahun_ajar,' . $id,
        'nama_tahun_ajar' => 'required',
        'semester'        => 'required|in:ganjil,genap',
    ]);

    $data->update([
        'kode_tahun_ajar' => $request->kode_tahun_ajar,
        'nama_tahun_ajar' => $request->nama_tahun_ajar,
        'semester'        => $request->semester,
    ]);

    return redirect()->route('admin.tahun-ajar.index')
        ->with('success', 'Tahun ajar berhasil diperbarui');
}

    public function destroy($id)
    {
        TahunAjar::findOrFail($id)->delete();

        return redirect()->route('admin.tahun-ajar.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
