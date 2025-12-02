@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <h3 class="text-2xl font-bold mb-6 text-gray-700">Tambah Siswa</h3>

    <form action="{{ route('admin.siswa.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-2 gap-5">

            {{-- NISN --}}
            <div>
                <label class="block font-semibold mb-1">NISN</label>
                <input type="number"
                       name="nisn"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                       required>
            </div>

            {{-- Nama --}}
            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text"
                       name="nama"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                       required>
            </div>

            {{-- Alamat --}}
            <div class="col-span-2">
                <label class="block font-semibold mb-1">Alamat</label>
                <textarea name="alamat"
                          rows="2"
                          class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                          required></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Tanggal Lahir</label>
                <input type="date"
                       name="tanggal_lahir"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                       required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Tahun Ajar</label>
                <select name="tahun_ajar_id"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    <option value="">-- Pilih Tahun Ajar --</option>
                    @foreach ($tahunAjar as $ta)
                        <option value="{{ $ta->id }}">{{ $ta->nama_tahun_ajar }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jurusan</label>
                <select name="jurusan_id"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($jurusan as $j)
                        <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Kelas</label>
                <select name="kelas_id"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.siswa.index') }}"
               class="px-5 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                Kembali
            </a>

            <button class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Simpan
            </button>
        </div>

    </form>

</div>
@endsection
