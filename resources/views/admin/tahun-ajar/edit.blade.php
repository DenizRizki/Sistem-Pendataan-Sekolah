@extends('layouts.admin')

@section('content')
<div class="px-6 py-8">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6">
        
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Edit Tahun Ajar</h2>

        <form action="{{ route('admin.tahun-ajar.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Kode Tahun Ajar
                    </label>
                    <input type="text" name="kode_tahun_ajar"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="{{ $data->kode_tahun_ajar }}" required>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Nama Tahun Ajar
                    </label>
                    <input type="text" name="nama_tahun_ajar"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="{{ $data->nama_tahun_ajar }}" required>
                </div>
            </div>

            <div class="mt-6">
                <label class="block font-semibold text-gray-700 mb-2">Semester</label>
                <select name="semester"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="ganjil" {{ $data->semester === 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                    <option value="genap" {{ $data->semester === 'genap' ? 'selected' : '' }}>Genap</option>
                </select>
            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('admin.tahun-ajar.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 transition">
                    Kembali
                </a>

                <button type="submit"
                        class="px-5 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
