@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Jurusan</h1>

    <form action="{{ route('admin.jurusan.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Kode Jurusan</label>
            <input type="text" 
                   name="kode_jurusan"
                   placeholder="001"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Nama Jurusan</label>
            <input type="text"
                   name="nama_jurusan"
                   placeholder="Rekayasa Perangkat Lunak"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                   required>
        </div>

        <div class="pt-4 flex justify-end gap-3">
            <a href="{{ route('admin.jurusan.index') }}" 
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                Kembali
            </a>

            <button 
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>

    </form>

</div>
@endsection
