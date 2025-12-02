@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Tahun Ajar</h1>

    <form action="{{ route('admin.tahun-ajar.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Kode Tahun Ajar</label>
            <input type="text" 
                   name="kode_tahun_ajar" 
                   class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                   placeholder="TA001"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tahun Ajar</label>
            <input type="text" 
                   name="nama_tahun_ajar" 
                   class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                   placeholder="2024/2025"
                   required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Semester</label>
            <select name="semester" 
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"
                    required>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
        </div>

        <div class="pt-4 flex justify-end gap-3">
            <a href="{{ route('admin.tahun-ajar.index') }}"
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
