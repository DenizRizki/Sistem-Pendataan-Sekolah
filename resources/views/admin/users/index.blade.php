@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-lg border border-blue-100">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-2xl font-bold text-blue-700">👥 User Management</h3>
            <p class="text-sm text-blue-400">Kelola akun admin dan guru pada sistem.</p>
        </div>

        <a href="{{ route('admin.users.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm transition">
            + Tambah User
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-50 text-green-700 border border-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABEL DESKTOP --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full border border-blue-100 rounded-lg overflow-hidden text-sm">
            <thead class="bg-blue-600 text-white">
                <tr class="text-left">
                    <th class="p-3">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Role</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b border-blue-50 hover:bg-blue-50 transition">

                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>

                        <td class="p-3">
                            @if ($user->role === 'admin')
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs">
                                    Admin
                                </span>
                            @else
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">
                                    Guru
                                </span>
                            @endif
                        </td>

                        <td class="p-3">
                            <div class="flex justify-center gap-3">

                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="px-3 py-1.5 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="px-3 py-1.5 bg-red-600 text-white rounded-lg text-xs hover:bg-red-700 transition">
                                            Hapus
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        Tidak ada user ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MOBILE CARD --}}
    <div class="space-y-4 md:hidden">
        @forelse ($users as $user)
        <div class="border border-blue-100 rounded-lg p-4 shadow-sm bg-blue-50">

            <div class="mb-2">
                <span class="font-semibold">Nama:</span>
                <p>{{ $user->name }}</p>
            </div>

            <div class="mb-2">
                <span class="font-semibold">Email:</span>
                <p>{{ $user->email }}</p>
            </div>

            <div class="mb-2">
                <span class="font-semibold">Role:</span>
                <p>
                    @if ($user->role === 'admin')
                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs">Admin</span>
                    @else
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">Guru</span>
                    @endif
                </p>
            </div>

            <div class="flex gap-2 mt-3">

                <a href="{{ route('admin.users.edit', $user->id) }}"
                   class="flex-1 text-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                    Edit
                </a>

                @if(auth()->id() !== $user->id)
                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                          method="POST"
                          class="flex-1">
                        @csrf
                        @method('DELETE')

                        <button class="w-full px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm">
                            Hapus
                        </button>
                    </form>
                @endif

            </div>

        </div>
        @empty
            <p class="text-center text-gray-500">Tidak ada user ditemukan.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

@endsection
