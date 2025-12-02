@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Jurusan</h1>

<div class="max-w-xl bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.jurusan.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Kode Jurusan</label>
            <input type="text" 
                   name="kode_jurusan" 
                   value="{{ $data->kode_jurusan }}" 
                   required
                   class="w-full border p-2 rounded focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Jurusan</label>
            <input type="text" 
                   name="nama_jurusan" 
                   value="{{ $data->nama_jurusan }}" 
                   required
                   class="w-full border p-2 rounded focus:ring focus:ring-blue-300">
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.jurusan.index') }}" 
               class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-900 transition">
                Kembali
            </a>

            <button type="submit" 
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
