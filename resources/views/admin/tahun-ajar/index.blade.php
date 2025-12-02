@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Tahun Ajar</h1>
            <p class="text-sm text-slate-500">
                Kelola data tahun ajar dan semester yang digunakan di sistem.
            </p>
        </div>

        <a href="{{ route('admin.tahun-ajar.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2.5 rounded-xl shadow-sm transition">
            <span class="text-lg leading-none">＋</span>
            <span>Tambah Tahun Ajar</span>
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-2xl border border-blue-100 p-6">
        <div class="overflow-x-auto rounded-xl border border-slate-200">
            <table class="min-w-full text-sm border-separate border-spacing-0">
                <thead>
                    <tr class="bg-blue-50">
                        <th class="px-4 py-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-slate-200">
                            Kode
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-slate-200">
                            Tahun Ajar
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-slate-200">
                            Semester
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-blue-800 uppercase tracking-wide border-b border-slate-200">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-50/70 transition-colors">
                            <td class="px-4 py-3 border-b border-slate-200 text-slate-800">
                                <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                    {{ $item->kode_tahun_ajar }}
                                </span>
                            </td>

                            <td class="px-4 py-3 border-b border-slate-200 text-slate-800">
                                {{ $item->nama_tahun_ajar }}
                            </td>

                            <td class="px-4 py-3 border-b border-slate-200 text-slate-800">
                                <span class="inline-flex items-center rounded-full bg-sky-50 px-2.5 py-0.5 text-xs font-medium text-sky-700 capitalize">
                                    {{ $item->semester }}
                                </span>
                            </td>

                            <td class="px-4 py-3 border-b border-slate-200">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('admin.tahun-ajar.edit', $item->id) }}"
                                       class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg border border-blue-500 text-blue-600 bg-blue-50 hover:bg-blue-100 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.tahun-ajar.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-slate-500 text-sm">
                                Belum ada data tahun ajar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
