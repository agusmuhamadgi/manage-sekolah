<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\KelasIndex;
use App\Livewire\SiswaIndex;
use App\Livewire\GuruIndex;
use App\Livewire\ListIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/kelas', KelasIndex::class)->name('kelas.index');
    Route::get('/siswa', SiswaIndex::class)->name('siswa.index');
    Route::get('/guru', GuruIndex::class)->name('guru.index');
    Route::get('/list', ListIndex::class)->name('list.index');
});

require __DIR__.'/auth.php';
