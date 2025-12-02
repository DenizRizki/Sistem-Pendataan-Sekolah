<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::with(['jurusan'])
            ->orderBy('level_kelas', 'ASC')
            ->paginate(10);

        return view('admin.kelas.index', compact('data'));
    }

    public function create()
    {
        $jurusan = Jurusan::orderBy('nama_jurusan')->get();

        return view('admin.kelas.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'     => 'required',
            'level_kelas'    => 'required|numeric',
            'jurusan_id'     => 'required|exists:jurusans,id',
        ]);

        Kelas::create($request->all());

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('admin.kelas.edit', compact('data', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas'     => 'required',
            'level_kelas'    => 'required|numeric',
            'jurusan_id'     => 'required|exists:jurusans,id',
        ]);

        $data = Kelas::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus');
    }
}
