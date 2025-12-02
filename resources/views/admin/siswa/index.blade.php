@extends('layouts.admin')

@section('content')

<div class="bg-white shadow-lg rounded-xl p-6 border border-blue-100">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-2xl font-bold text-blue-700">📚 Data Siswa</h3>
            <p class="text-sm text-blue-400">Kelola data siswa, lengkap dengan pencarian dan filter.</p>
        </div>

        <a href="{{ route('admin.siswa.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm transition">
            + Tambah Siswa
        </a>
    </div>

    <div class="bg-blue-50 p-4 rounded-lg mb-6 border border-blue-100">
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4" method="GET">

            <input type="text" name="search" placeholder="Cari nama atau NISN..."
                   value="{{ request('search') }}"
                   class="border border-blue-200 rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400 focus:outline-none">

            <select name="kelas_id"
                    class="border border-blue-200 rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">-- Filter Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>

            <select name="jurusan_id"
                    class="border border-blue-200 rounded-lg p-2 w-full focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <option value="">-- Filter Jurusan --</option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}" {{ request('jurusan_id') == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>

            <button
                class="bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700 shadow-sm transition">
                Filter
            </button>

        </form>
    </div>

    <div class="hidden md:block overflow-x-auto">
        <table class="w-full border border-blue-100 rounded-lg overflow-hidden text-sm">
            <thead>
                <tr class="bg-blue-600 text-white text-left">
                    <th class="p-3">NISN</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Tahun Ajar</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Jurusan</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($siswa as $s)
                    <tr class="border-b border-blue-50 hover:bg-blue-50 transition">
                        <td class="p-3">{{ $s->nisn }}</td>
                        <td class="p-3">{{ $s->nama }}</td>
                        <td class="p-3">{{ $s->tahunAjar->nama_tahun_ajar ?? '-' }}</td>
                        <td class="p-3">{{ $s->kelas->nama_kelas ?? '-' }}</td>
                        <td class="p-3">{{ $s->jurusan->nama_jurusan ?? '-' }}</td>

                        <td class="p-3">
                            <div class="flex justify-center gap-4 text-sm">

                                <a href="{{ route('admin.siswa.show', $s->id) }}"
                                   class="text-blue-600 hover:text-blue-800 hover:underline">
                                    Detail
                                </a>

                                <a href="{{ route('admin.siswa.edit', $s->id) }}"
                                   class="text-yellow-500 hover:text-yellow-600 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('admin.siswa.destroy', $s->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-700 hover:underline">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">
                        Tidak ada data siswa ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="md:hidden space-y-4">
        @forelse ($siswa as $s)
        <div class="border border-blue-100 rounded-lg p-4 bg-blue-50 shadow-sm">

            <p class="mb-1"><span class="font-semibold">NISN:</span> {{ $s->nisn }}</p>
            <p class="mb-1"><span class="font-semibold">Nama:</span> {{ $s->nama }}</p>
            <p class="mb-1"><span class="font-semibold">Tahun Ajar:</span> {{ $s->tahunAjar->nama_tahun_ajar ?? '-' }}</p>
            <p class="mb-1"><span class="font-semibold">Kelas:</span> {{ $s->kelas->nama_kelas ?? '-' }}</p>
            <p class="mb-1"><span class="font-semibold">Jurusan:</span> {{ $s->jurusan->nama_jurusan ?? '-' }}</p>

            <div class="flex gap-2 mt-3">

                <a href="{{ route('admin.siswa.show', $s->id) }}"
                   class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 text-sm">
                    Detail
                </a>

                <a href="{{ route('admin.siswa.edit', $s->id) }}"
                   class="flex-1 bg-yellow-500 text-white text-center py-2 rounded-lg hover:bg-yellow-600 text-sm">
                    Edit
                </a>

                <form action="{{ route('admin.siswa.destroy', $s->id) }}"
                      method="POST"
                      class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 text-sm">
                        Hapus
                    </button>
                </form>

            </div>
        </div>
        @empty
            <p class="text-center text-gray-500">Tidak ada data siswa ditemukan.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $siswa->links() }}
    </div>

</div>

@endsection
