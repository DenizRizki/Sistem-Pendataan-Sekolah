@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

{{-- CARD STATISTIK --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-sm text-gray-500">Total Siswa</h2>
        <p class="text-2xl font-bold">{{ \App\Models\Siswa::count() }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-sm text-gray-500">Total Jurusan</h2>
        <p class="text-2xl font-bold">{{ \App\Models\Jurusan::count() }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-sm text-gray-500">Total Kelas</h2>
        <p class="text-2xl font-bold">{{ \App\Models\Kelas::count() }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-sm text-gray-500">Total User</h2>
        <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
    </div>

</div>

{{-- TABEL DATA SISWA --}}
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Data Siswa Terbaru</h2>

    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">NISN</th>
                <th class="p-3 text-left">Kelas</th>
                <th class="p-3 text-left">Jurusan</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($siswa as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $item->nama }}</td>
                    <td class="p-3">{{ $item->nisn }}</td>
                    <td class="p-3">{{ $item->kelas->nama_kelas }}</td>
                    <td class="p-3">{{ $item->jurusan->nama_jurusan }}</td>
                </tr>

            @empty
                <tr>
                    <td colspan="4" class="text-center p-3 text-gray-500">
                        Belum ada data siswa
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

    <div class="mt-4">
        {{ $siswa->links() }}
    </div>
</div>

@endsection
