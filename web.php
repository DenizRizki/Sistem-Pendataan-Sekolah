<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TahunAjarController,
    JurusanController,
    KelasController,
    SiswaController,
    UserController,
    ProfileController
};

Route::redirect('/', '/login');


// ===============================
// REDIRECT DASHBOARD
// ===============================
Route::get('/dashboard', function () {

    // Admin → dashboard admin
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    // Guru → juga dashboard admin
    if (auth()->user()->role === 'guru') {
        return redirect()->route('admin.dashboard');
    }

})->middleware(['auth', 'verified'])->name('dashboard');


// ===============================
// PROFILE (ADMIN + GURU)
// ===============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ===============================
// ADMIN GROUP
// ===============================
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard — guru dan admin keduanya bisa masuk
    Route::get('/dashboard', function () {
        $siswa = \App\Models\Siswa::paginate(10);
        return view('admin.dashboard', compact('siswa'));
    })->name('dashboard');


    // CRUD untuk semua (admin+guru)
    Route::resource('tahun-ajar', TahunAjarController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);

    // Naik kelas
    Route::post('/siswa/{id}/naik-kelas', [SiswaController::class, 'naikKelas'])
        ->name('siswa.naikKelas');


    // USER MANAGEMENT — hanya admin yang boleh
    Route::middleware('is_admin')->group(function () {
        Route::resource('users', UserController::class);
    });

});


// ===============================
// GURU GROUP
// ===============================
// Guru juga harus tetap bisa masuk rute khusus guru jika dibutuhkan
Route::middleware(['auth', 'is_guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {

    // Dashboard guru (redirect ke admin dashboard saja)
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

});

require __DIR__.'/auth.php';
