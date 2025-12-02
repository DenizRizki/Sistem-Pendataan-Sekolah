<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::orderBy('kode_jurusan', 'ASC')->paginate(10);
        return view('admin.jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan' => 'required|unique:jurusans',
            'nama_jurusan' => 'required',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jurusan' => 'required|unique:jurusans,kode_jurusan,' . $id,
            'nama_jurusan' => 'required',
        ]);

        $data = Jurusan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Jurusan::findOrFail($id)->delete();
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
