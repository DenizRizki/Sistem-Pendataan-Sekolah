@extends('layouts.admin')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
    <p class="text-sm text-gray-500 mt-1">
        Ringkasan data siswa, jurusan, kelas, dan user.
    </p>
</div>

{{-- CARD STATISTIK --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

    {{-- Card Total Siswa --}}
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-blue-100 hover:shadow-md transition">
        <div class="p-5">
            <p class="text-xs font-semibold text-blue-500 uppercase tracking-wide">
                Total Siswa
            </p>
            <p class="mt-3 text-3xl font-bold text-gray-900">
                {{ \App\Models\Siswa::count() }}
            </p>
        </div>
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-blue-500 to-blue-400"></div>
    </div>

    {{-- Card Total Jurusan --}}
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-blue-100 hover:shadow-md transition">
        <div class="p-5">
            <p class="text-xs font-semibold text-blue-500 uppercase tracking-wide">
                Total Jurusan
            </p>
            <p class="mt-3 text-3xl font-bold text-gray-900">
                {{ \App\Models\Jurusan::count() }}
            </p>
        </div>
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-blue-400 to-blue-500"></div>
    </div>

    {{-- Card Total Kelas --}}
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-blue-100 hover:shadow-md transition">
        <div class="p-5">
            <p class="text-xs font-semibold text-blue-500 uppercase tracking-wide">
                Total Kelas
            </p>
            <p class="mt-3 text-3xl font-bold text-gray-900">
                {{ \App\Models\Kelas::count() }}
            </p>
        </div>
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-blue-500 to-sky-400"></div>
    </div>

    {{-- Card Total User --}}
    <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-blue-100 hover:shadow-md transition">
        <div class="p-5">
            <p class="text-xs font-semibold text-blue-500 uppercase tracking-wide">
                Total User
            </p>
            <p class="mt-3 text-3xl font-bold text-gray-900">
                {{ \App\Models\User::count() }}
            </p>
        </div>
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-sky-500 to-blue-500"></div>
    </div>

</div>

{{-- TABEL DATA SISWA --}}
<div class="bg-white shadow-sm rounded-2xl border border-blue-100 p-6">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Data Siswa Terbaru</h2>
            <p class="text-sm text-gray-500">Menampilkan siswa terbaru yang terdaftar di sistem.</p>
        </div>
    </div>

    <div class="overflow-x-auto rounded-xl border border-blue-50">
        <table class="min-w-full border-separate border-spacing-0">
            <thead>
                <tr class="bg-blue-50">
                    <th class="p-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-blue-100">
                        Nama
                    </th>
                    <th class="p-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-blue-100">
                        NISN
                    </th>
                    <th class="p-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-blue-100">
                        Kelas
                    </th>
                    <th class="p-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-blue-100">
                        Jurusan
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $item)
                    <tr class="hover:bg-blue-50/60 transition">
                        <td class="p-3 text-sm text-gray-800 border-b border-blue-50">
                            {{ $item->nama }}
                        </td>
                        <td class="p-3 text-sm text-gray-800 border-b border-blue-50">
                            {{ $item->nisn }}
                        </td>
                        <td class="p-3 text-sm text-gray-800 border-b border-blue-50">
                            {{ $item->kelas->nama_kelas }}
                        </td>
                        <td class="p-3 text-sm text-gray-800 border-b border-blue-50">
                            {{ $item->jurusan->nama_jurusan }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-6 text-gray-500 text-sm">
                            Belum ada data siswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $siswa->links() }}
    </div>
</div>

@endsection
