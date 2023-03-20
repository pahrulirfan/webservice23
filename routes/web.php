<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstitutionController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/mahasiswa')->group(function () {

    Route::get('/nama/{nama}', function ($nama) {
        return "Nama Mahasiswa :  $nama";
    });

    Route::get('/umur/{umur}', function ($umur) {
        return "Umur Mahasiswa :  $umur";
    });

    Route::get('/alamat/{alamat}', function ($alamat) {
        return "alamat Mahasiswa :  $alamat";
    });

});

// route ke view
Route::get('/view-app', function () {
    return view('app');
});

// route ke controller
Route::get('test/{kode}', [TestController::class, 'index']);

// route untuk course
Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('institution', [InstitutionController::class, 'index'])->name('institution.index');
