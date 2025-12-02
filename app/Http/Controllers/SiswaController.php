<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\KelasDetail;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $kelas_id = $request->kelas_id;
        $jurusan_id = $request->jurusan_id;

        $query = Siswa::with(['kelas', 'jurusan', 'tahunAjar']);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%$search%")
                  ->orWhere('nisn', 'LIKE', "%$search%");
            });
        }

        if ($kelas_id) {
            $query->where('kelas_id', $kelas_id);
        }

        if ($jurusan_id) {
            $query->where('jurusan_id', $jurusan_id);
        }

        $siswa = $query->orderBy('nama')->paginate(10)->withQueryString();

        return view('admin.siswa.index', [
            'siswa'   => $siswa,
            'kelas'   => Kelas::orderBy('nama_kelas')->get(),
            'jurusan' => Jurusan::orderBy('nama_jurusan')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.siswa.create', [
            'kelas'      => Kelas::all(),
            'jurusan'    => Jurusan::all(),
            'tahunAjar'  => TahunAjar::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas,nisn',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show($id)
{
    return view('admin.siswa.show', [
        'siswa' => Siswa::with(['kelas','jurusan','tahunAjar'])->findOrFail($id),
        'kelas' => Kelas::all(),
        'tahunAjar' => TahunAjar::all(),
        'history' => KelasDetail::with(['kelas','tahunAjar'])
                        ->where('siswa_id', $id)
                        ->orderBy('id', 'desc')
                        ->get()
    ]);
}


public function naikKelas(Request $request, $id)
{
    $request->validate([
        'kelas_id' => 'required',
        'tahun_ajar_id' => 'required',
    ]);

    $siswa = Siswa::findOrFail($id);
    KelasDetail::where('siswa_id', $id)->update(['status' => 'nonaktif']);
    KelasDetail::create([
        'siswa_id' => $id,
        'kelas_id' => $request->kelas_id,
        'tahun_ajar_id' => $request->tahun_ajar_id,
        'status' => 'aktif'
    ]);

    $siswa->update([
        'kelas_id' => $request->kelas_id,
        'tahun_ajar_id' => $request->tahun_ajar_id,
    ]);

    return redirect()->back()->with('success', 'Kenaikan kelas berhasil disimpan!');
}

    public function edit($id)
    {
        return view('admin.siswa.edit', [
            'siswa'     => Siswa::findOrFail($id),
            'kelas'     => Kelas::orderBy('nama_kelas')->get(),
            'jurusan'   => Jurusan::orderBy('nama_jurusan')->get(),
            'tahunAjar' => TahunAjar::orderBy('nama_tahun_ajar')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $data = Siswa::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}
