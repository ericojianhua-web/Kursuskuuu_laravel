<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

// ==========================================
// HALAMAN UTAMA
// ==========================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ==========================================
// FORM PENDAFTARAN KURSUS
// ==========================================

Route::get('/enrollments/create', function () {

    $siteName = 'KursusKu Erik Ajaya';

    $courses = [
        1 => [
            'name' => 'Web Dasar',
            'remaining' => 12
        ],
        2 => [
            'name' => 'PHP Dasar',
            'remaining' => 8
        ],
        3 => [
            'name' => 'Laravel Dasar',
            'remaining' => 4
        ],
    ];

    return view('enrollments.create', compact(
        'courses',
        'siteName'
    ));

})->name('enrollments.create');


// ==========================================
// PROSES DAN VALIDASI PENDAFTARAN
// ==========================================

Route::post('/enrollments/preview', function (Request $request) {

    $siteName = 'KursusKu Erik Ajaya';

    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:100',
        'course_id' => 'required|in:1,2,3',
    ], [
        'name.required' => 'Nama lengkap wajib diisi.',
        'name.max' => 'Nama maksimal 100 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.max' => 'Email maksimal 100 karakter.',
        'course_id.required' => 'Silakan pilih kursus.',
        'course_id.in' => 'Pilihan kursus tidak valid.',
    ]);

    $courses = [
        1 => 'Web Dasar',
        2 => 'PHP Dasar',
        3 => 'Laravel Dasar',
    ];

    $validated['course_name'] = $courses[$validated['course_id']];

    return view('enrollments.preview', compact(
        'validated',
        'siteName'
    ));

})->name('enrollments.preview');


// ==========================================
// CEK KETERSEDIAAN KURSUS MELALUI AJAX
// ==========================================

Route::get('/courses/{course}/availability', function ($course) {

    $courses = [
        1 => [
            'name' => 'Web Dasar',
            'remaining' => 12
        ],
        2 => [
            'name' => 'PHP Dasar',
            'remaining' => 8
        ],
        3 => [
            'name' => 'Laravel Dasar',
            'remaining' => 4
        ],
    ];

    abort_unless(isset($courses[$course]), 404);

    return response()->json([
        'course' => $courses[$course]['name'],
        'remaining' => $courses[$course]['remaining'],
    ]);

})->whereNumber('course')->name('courses.availability');


// ==========================================
// MANAJEMEN DATA KURSUS (WEEK 10)
// ==========================================

Route::resource('courses', CourseController::class);