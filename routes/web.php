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

// Redirect awal
Route::get('/dashboard', function () {

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if (auth()->user()->role === 'guru') {
        return redirect()->route('admin.dashboard');
    }

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Admin
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard main
    Route::get('/dashboard', function () {
        $siswa = \App\Models\Siswa::paginate(10);
        return view('admin.dashboard', compact('siswa'));
    })->name('dashboard');

    // CRUD 
    Route::resource('tahun-ajar', TahunAjarController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);

    // Kelas
    Route::post('/siswa/{id}/naik-kelas', [SiswaController::class, 'naikKelas'])
        ->name('siswa.naikKelas');


    // User management
    Route::middleware('is_admin')->group(function () {
        Route::resource('users', UserController::class);
    });

});

// GURU 
Route::middleware(['auth', 'is_guru'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {

    // Dashboard guru 
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

});

require __DIR__.'/auth.php';
