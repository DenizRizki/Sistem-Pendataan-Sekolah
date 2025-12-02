@extends('layouts.admin')

@section('content')
<div class="bg-white shadow rounded-lg p-6">

    <h3 class="text-2xl font-bold mb-6">Detail Siswa</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

        <div class="border rounded-lg p-4 bg-gray-50">
            <h4 class="text-xl font-semibold mb-4">Data Siswa</h4>

            <div class="space-y-2 text-lg">
                <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
                <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
                <p><strong>Jenis Kelamin:</strong> 
                    {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </p>
                <p><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</p>
                <p><strong>Kelas Sekarang:</strong> {{ $siswa->kelas->nama_kelas }}</p>
                <p><strong>Jurusan:</strong> {{ $siswa->jurusan->nama_jurusan }}</p>
                <p><strong>Tahun Ajar Sekarang:</strong> {{ $siswa->tahunAjar->nama_tahun_ajar }}</p>
            </div>
        </div>

        <div class="border rounded-lg p-4 bg-gray-50">
            <h4 class="text-xl font-semibold mb-4">Naik Kelas / Tahun Ajar</h4>

            <form action="{{ route('admin.siswa.naikKelas', $siswa->id) }}" method="POST">
                @csrf

                <div class="space-y-4">

                    <div>
                        <label class="font-semibold">Kelas Baru</label>
                        <select name="kelas_id" class="border rounded p-2 w-full" required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">Tahun Ajar Baru</label>
                        <select name="tahun_ajar_id" class="border rounded p-2 w-full" required>
                            <option value="">-- Pilih Tahun Ajar --</option>
                            @foreach ($tahunAjar as $ta)
                                <option value="{{ $ta->id }}">{{ $ta->nama_tahun_ajar }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <button class="mt-4 w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Simpan Kenaikan
                </button>
            </form>
        </div>

    </div>

    <h4 class="text-xl font-bold mb-3">Riwayat Kenaikan Kelas</h4>

    <table class="w-full border rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Kelas</th>
                <th class="p-3 text-left">Tahun Ajar</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Tanggal Update</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($history as $h)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $h->kelas->nama_kelas }}</td>
                    <td class="p-3">{{ $h->tahunAjar->nama_tahun_ajar }}</td>

                    <td class="p-3">
                        @if($h->status == 'aktif')
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded">Aktif</span>
                        @else
                            <span class="px-2 py-1 bg-gray-200 text-gray-600 rounded">Nonaktif</span>
                        @endif
                    </td>

                    <td class="p-3">{{ $h->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.siswa.index') }}"
       class="mt-6 inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
        Kembali
    </a>

</div>
@endsection
