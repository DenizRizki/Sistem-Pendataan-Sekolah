@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <h3 class="text-2xl font-bold mb-6 text-gray-700">Edit Data Siswa</h3>

    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-5">

            <div>
                <label class="block font-semibold mb-1">NISN</label>
                <input type="text"
                       name="nisn"
                       value="{{ $siswa->nisn }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                       required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text"
                       name="nama"
                       value="{{ $siswa->nama }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                       required>
            </div>

            <div class="col-span-2">
                <label class="block font-semibold mb-1">Alamat</label>
                <textarea name="alamat"
                          rows="3"
                          class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                          required>{{ $siswa->alamat }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Tanggal Lahir</label>
                <input type="date"
                       name="tanggal_lahir"
                       value="{{ $siswa->tanggal_lahir }}"
                       class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                       required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Tahun Ajar</label>
                <select name="tahun_ajar_id"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    @foreach ($tahunAjar as $t)
                        <option value="{{ $t->id }}"
                            {{ $siswa->tahun_ajar_id == $t->id ? 'selected' : '' }}>
                            {{ $t->nama_tahun_ajar }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Kelas</label>
                <select name="kelas_id"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}"
                            {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jurusan</label>
                <select name="jurusan_id"
                        class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                        required>
                    @foreach ($jurusan as $j)
                        <option value="{{ $j->id }}"
                            {{ $siswa->jurusan_id == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.siswa.index') }}"
               class="px-5 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                Kembali
            </a>

            <button class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>
@endsection
