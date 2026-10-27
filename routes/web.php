<?php

use Illuminate\Support\Facades\Route;

// ─── Landing ───
Route::get('/', function () {
    return view('landing');
})->name('home');

// ─── Klien ───
Route::get('/browse-kampus', function () {
    return view('browse-kampus');
})->name('browse-kampus');

Route::get('/browse-kating', function () {
    return view('browse-kating');
})->name('browse-kating');

Route::get('/profil-kating/{id}', function ($id) {
    return view('profil-kating');
})->name('profil-kating');

Route::get('/ajukan-layanan/{katingId}', function ($katingId) {
    return view('ajukan-layanan');
})->name('ajukan-layanan');

Route::get('/permintaan-saya', function () {
    return view('permintaan-saya');
})->name('permintaan-saya');

Route::get('/detail-layanan/{id}', function ($id) {
    return view('detail-layanan', ['layananId' => $id]);
})->name('detail-layanan');

Route::get('/chat', function () {
    return view('chat');
})->name('chat');

Route::get('/chat/{id}', function ($id) {
    return view('chat');
})->name('chat.detail');

Route::get('/admin-help', function () {
    return view('admin-help');
})->name('admin-help');

Route::get('/riwayat', function () {
    return view('riwayat');
})->name('riwayat');

// ─── Kating Dashboard ───
Route::prefix('kating')->name('kating.')->group(function () {
    Route::get('/dashboard', function () {
        return view('kating.dashboard');
    })->name('dashboard');

    Route::get('/permintaan', function () {
        return view('kating.permintaan');
    })->name('permintaan');

    Route::get('/aktif', function () {
        return view('kating.aktif');
    })->name('aktif');

    Route::get('/laporan/{layananId?}', function ($layananId = 'apartment') {
        return view('kating.laporan', ['layananId' => $layananId]);
    })->name('laporan');

    Route::get('/riwayat', function () {
        return view('kating.riwayat');
    })->name('riwayat');

    Route::get('/chat', function () {
        return view('chat');
    })->name('chat');

    Route::get('/profil', function () {
        return view('kating.profil-saya');
    })->name('profil');
});

// ─── Admin Dashboard ───
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/approval', function () {
        return view('admin.approval');
    })->name('approval');

    Route::get('/antrian', function () {
        return view('admin.antrian');
    })->name('antrian');

    Route::get('/moderasi', function () {
        return view('admin.moderasi');
    })->name('moderasi');

    Route::get('/support', function () {
        return view('admin.support');
    })->name('support');

    Route::get('/log-chat', function () {
        return view('admin.log-chat');
    })->name('log-chat');
});
