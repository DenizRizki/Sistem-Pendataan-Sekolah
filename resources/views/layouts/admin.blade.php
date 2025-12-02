<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          referrerpolicy="no-referrer" />
</head>

<body class="bg-slate-100">

<div class="min-h-screen flex">

    <button id="menu-btn"
        class="md:hidden fixed top-4 left-4 z-50 bg-blue-600 text-white p-2.5 rounded-lg shadow-lg active:scale-95 transition">
        <i class="fa-solid fa-bars text-xl"></i>
    </button>
    <aside id="sidebar"
        class="w-64 bg-gradient-to-b from-blue-600 to-blue-700 text-blue-50 flex flex-col
               fixed md:static inset-y-0 left-0 transform -translate-x-full md:translate-x-0
               transition-transform duration-300 z-40 shadow-xl">

        <div class="flex items-center gap-3 px-4 pt-6 pb-6 border-b border-blue-500/40">
            <img src="{{ asset('storage/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png') }}"
                 class="h-10 w-10 rounded-lg object-cover shadow">
            <div>
                <p class="text-lg font-semibold text-white tracking-wide">DATA SEKOLAH</p>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">

            <p class="px-2 text-[10px] font-bold uppercase text-blue-200 tracking-wider">Main</p>

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
               {{ request()->routeIs('admin.dashboard') ? 'bg-blue-500 text-white shadow' : 'hover:bg-blue-500/40 text-blue-100' }}">
                <i class="fa-solid fa-gauge"></i>
                Dashboard
            </a>

            <p class="px-2 mt-4 text-[10px] font-bold uppercase text-blue-200 tracking-wider">Data Master</p>
            
             <a href="{{ route('admin.jurusan.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
               {{ request()->routeIs('admin.jurusan.*') ? 'bg-blue-500 text-white shadow' : 'hover:bg-blue-500/40 text-blue-100' }}">
                <i class="fa-solid fa-layer-group"></i>
                Jurusan
            </a>
            
            <a href="{{ route('admin.kelas.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
               {{ request()->routeIs('admin.kelas.*') ? 'bg-blue-500 text-white shadow' : 'hover:bg-blue-500/40 text-blue-100' }}">
                <i class="fa-solid fa-school"></i>
                Kelas
            </a>

            <a href="{{ route('admin.tahun-ajar.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
               {{ request()->routeIs('admin.tahun-ajar.*') ? 'bg-blue-500 text-white shadow' : 'hover:bg-blue-500/40 text-blue-100' }}">
                <i class="fa-solid fa-calendar-days"></i>
                Tahun Ajar
            </a>

             <a href="{{ route('admin.siswa.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
               {{ request()->routeIs('admin.siswa.*') ? 'bg-blue-500 text-white shadow' : 'hover:bg-blue-500/40 text-blue-100' }}">
                <i class="fa-solid fa-user-graduate"></i>
                Siswa
            </a>

            @if(auth()->check() && auth()->user()->role === 'admin')
                <p class="px-2 mt-4 text-[10px] font-bold uppercase text-blue-200 tracking-wider">Pengguna</p>

                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
                   {{ request()->routeIs('admin.users.*') ? 'bg-blue-500 text-white shadow' : 'hover:bg-blue-500/40 text-blue-100' }}">
                    <i class="fa-solid fa-users"></i>
                    User Management
                </a>
            @endif

        </nav>

        @if(auth()->check())
        <div class="mt-auto border-t border-blue-500/40 px-4 py-5">

            <div class="flex items-center gap-3 mb-3">
                <div class="h-10 w-10 bg-blue-400 rounded-full flex items-center justify-center text-white font-bold shadow">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[11px] text-blue-200">Logged in</p>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="w-full flex items-center gap-2 px-3 py-2.5 bg-blue-500/60 hover:bg-blue-500
                           text-white rounded-lg text-sm shadow active:scale-95 transition">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </button>
            </form>

        </div>
        @endif

    </aside>

    <main class="flex-1 min-h-screen bg-slate-50 pt-16 md:pt-6">
        <div class="px-6 pb-6">
            @yield('content')
        </div>
    </main>

</div>

<script>
    const menuBtn  = document.getElementById('menu-btn');
    const sidebar  = document.getElementById('sidebar');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });
</script>

</body>
</html>
