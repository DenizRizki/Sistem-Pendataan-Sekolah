@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Kelas</h1>

    <form action="{{ route('admin.kelas.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Nama Kelas</label>
            <input type="text"
                   name="nama_kelas"
                   placeholder="XII-1"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Level Kelas</label>
            <input type="number"
                   name="level_kelas"
                   placeholder="12"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Jurusan</label>
            <select name="jurusan_id"
                    class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                    required>
                <option value="">-- Pilih Jurusan --</option>

                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}">
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="pt-4 flex justify-end gap-3">
            <a href="{{ route('admin.kelas.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                Kembali
            </a>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>

    </form>

</div>
@endsection
