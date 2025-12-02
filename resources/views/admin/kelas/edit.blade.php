@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Kelas</h1>

<div class="max-w-xl bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.kelas.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Kelas</label>
            <input type="text" 
                   name="nama_kelas" 
                   value="{{ $data->nama_kelas }}" 
                   required
                   class="w-full border p-2 rounded focus:ring focus:ring-blue-300">
        </div>

       <div class="mb-4">
            <label class="block font-semibold mb-1">Level Kelas</label>
            <input type="text" 
                   name="nama_kelas" 
                   value="{{ $data->level_kelas }}" 
                   required
                   class="w-full border p-2 rounded focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Jurusan</label>
            <select name="jurusan_id" 
                    required
                    class="w-full border p-2 rounded focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Jurusan --</option>

                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}" 
                            {{ $data->jurusan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.kelas.index') }}" 
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
