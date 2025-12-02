@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">

    <h3 class="text-3xl font-bold mb-6 text-gray-800"> Edit User</h3>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg border border-red-300">
            <ul class="list-disc ml-5 space-y-1">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
    @csrf
    @method('PUT')

    <div>
        <label class="font-semibold text-gray-700">Nama</label>
        <input type="text" name="name"
               class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-blue-400"
               value="{{ $user->name }}" required>
    </div>

    <div>
        <label class="font-semibold text-gray-700">Email</label>
        <input type="email" name="email"
               class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-blue-400"
               value="{{ $user->email }}" required>
    </div>

    <div>
        <label class="font-semibold text-gray-700">Role</label>
        <select name="role"
                class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-blue-400">
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
        </select>
    </div>

    <button
        class="w-full mt-4 bg-blue-600 text-white px-4 py-3 rounded-lg shadow hover:bg-blue-700 transition">
        Update User
    </button>

</form>

</div>
@endsection
