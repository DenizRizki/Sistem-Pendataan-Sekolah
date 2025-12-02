@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Data Jurusan</h1>
            <p class="text-sm text-slate-500">Kelola daftar jurusan sekolah.</p>
        </div>

        <a href="{{ route('admin.jurusan.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2.5 rounded-xl shadow-sm transition">
            <span class="text-lg leading-none">＋</span> Tambah Jurusan
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-2xl border border-blue-100 p-6">
        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="min-w-full text-sm border-separate border-spacing-0">

                <thead>
                    <tr class="bg-blue-50">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-blue-100">
                            Kode Jurusan
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-blue-100">
                            Nama Jurusan
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-blue-100">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-50 transition">

                            <td class="px-4 py-3 border-b border-slate-200 text-slate-800">
                                <span class="bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full text-xs font-medium">
                                    {{ $item->kode_jurusan }}
                                </span>
                            </td>

                            <td class="px-4 py-3 border-b border-slate-200 text-slate-800">
                                {{ $item->nama_jurusan }}
                            </td>

                            <td class="px-4 py-3 border-b border-slate-200">
                                <div class="flex gap-2">

                                    <a href="{{ route('admin.jurusan.edit', $item->id) }}"
                                       class="px-3 py-1.5 text-xs font-medium rounded-lg border border-blue-500 text-blue-600 bg-blue-50 hover:bg-blue-100 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.jurusan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1.5 text-xs font-medium rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-center text-slate-500 text-sm">
                                Belum ada data jurusan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="mt-5">
            {{ $data->links() }}
        </div>
    </div>

</div>

@endsection
