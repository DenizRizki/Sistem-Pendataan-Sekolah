<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aplikasi</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 flex items-center justify-center">

    <div class="max-w-4xl w-full mx-4 md:mx-0 bg-white/90 backdrop-blur shadow-2xl rounded-2xl overflow-hidden grid md:grid-cols-2">
        <div class="p-8 md:p-10 flex flex-col justify-center">
            <div class="mb-6">
                <p class="text-xs font-semibold tracking-[0.2em] text-blue-500 uppercase mb-2">Selamat Datang</p>
                <h2 class="text-3xl font-bold text-slate-800">Login</h2>
                <p class="text-sm text-slate-500 mt-1">
                    Masuk ke akun admin atau guru untuk mengelola data sekolah.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-600 text-sm px-3 py-2">
                    <span>Login gagal, periksa kembali email dan password.</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">
                        Email
                    </label>
                    <input id="email" type="email" name="email"
                           class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                           value="{{ old('email') }}"
                           required autofocus>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">
                        Password
                    </label>
                    <input id="password" type="password" name="password"
                           class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                           required>
                </div>

                <button
                    class="w-full bg-blue-600 text-white py-2.5 rounded-lg text-sm font-semibold mt-2
                           hover:bg-blue-700 active:scale-[0.98] transition shadow-md">
                    Login
                </button>
            </form>

            <p class="mt-6 text-[11px] text-slate-400">
                &copy; {{ date('Y') }} Aplikasi Manajemen Sekolah.
            </p>
        </div>

        <div class="hidden md:flex flex-col bg-blue-600">
            <div class="flex-1 flex items-center justify-center px-6 pt-6">
                <img src="{{ asset('storage/Desian-Web.jpg') }}"
                     class="max-h-64 w-full object-contain rounded-xl shadow-lg bg-white"
                     alt="Ilustrasi Login">
            </div>

      
        </div>

    </div>

</body>
</html>
