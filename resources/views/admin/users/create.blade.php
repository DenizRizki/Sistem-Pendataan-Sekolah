@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">

    <h3 class="text-3xl font-bold mb-6 text-gray-800">➕ Tambah User Baru</h3>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg border border-red-300">
            <ul class="list-disc ml-5 space-y-1">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1 text-gray-700">Nama</label>
            <input type="text" name="name"
                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                value="{{ old('name') }}" placeholder="Nama lengkap" required>
        </div>

        <div>
            <label class="block font-semibold mb-1 text-gray-700">Email</label>
            <input type="email" name="email"
                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                value="{{ old('email') }}" placeholder="Email aktif" required>
        </div>

        <div>
            <label class="block font-semibold mb-1 text-gray-700">Password</label>
            <input type="password" name="password"
                class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                placeholder="Minimal 6 karakter" required>
        </div>

        <div>
            <label class="block font-semibold mb-1 text-gray-700">Role</label>

            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="role" value="admin" required>
                    <span class="text-gray-700">Admin</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="role" value="guru" required>
                    <span class="text-gray-700">Guru</span>
                </label>
            </div>
        </div>

        <div class="flex gap-4 mt-6">
            <button
                class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition w-full">
                Simpan User
            </button>

            <a href="{{ route('admin.users.index') }}"
               class="px-6 py-3 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 transition w-full text-center">
                Kembali
            </a>
        </div>
    </form>

</div>
@endsection
