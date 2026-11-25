<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Membuat user jika belum tersedia
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        // Data tambahan untuk pengujian pagination
        $courses = [
            [
                'code' => 'HTML003',
                'name' => 'HTML Lanjutan',
                'description' => 'Mempelajari HTML tingkat lanjut.',
                'fee' => 150000,
                'quota' => 20,
                'start_date' => '2026-12-01',
                'status' => 'open',
            ],
            [
                'code' => 'CSS003',
                'name' => 'CSS Dasar',
                'description' => 'Mempelajari dasar desain menggunakan CSS.',
                'fee' => 125000,
                'quota' => 20,
                'start_date' => '2026-12-02',
                'status' => 'open',
            ],
            [
                'code' => 'JS003',
                'name' => 'JavaScript Lanjutan',
                'description' => 'Mempelajari JavaScript tingkat lanjut.',
                'fee' => 200000,
                'quota' => 15,
                'start_date' => '2026-12-03',
                'status' => 'closed',
            ],
            [
                'code' => 'PHP003',
                'name' => 'PHP Lanjutan',
                'description' => 'Mempelajari pemrograman PHP tingkat lanjut.',
                'fee' => 175000,
                'quota' => 15,
                'start_date' => '2026-12-04',
                'status' => 'open',
            ],
            [
                'code' => 'LAR003',
                'name' => 'Laravel Lanjutan',
                'description' => 'Mempelajari framework Laravel tingkat lanjut.',
                'fee' => 250000,
                'quota' => 15,
                'start_date' => '2026-12-05',
                'status' => 'draft',
            ],
            [
                'code' => 'DB003',
                'name' => 'Database Lanjutan',
                'description' => 'Mempelajari pengelolaan database.',
                'fee' => 180000,
                'quota' => 20,
                'start_date' => '2026-12-06',
                'status' => 'closed',
            ],
            [
                'code' => 'PY003',
                'name' => 'Python Dasar',
                'description' => 'Pengenalan bahasa pemrograman Python.',
                'fee' => 175000,
                'quota' => 20,
                'start_date' => '2026-12-07',
                'status' => 'open',
            ],
            [
                'code' => 'JAVA003',
                'name' => 'Java Dasar',
                'description' => 'Pengenalan bahasa pemrograman Java.',
                'fee' => 200000,
                'quota' => 15,
                'start_date' => '2026-12-08',
                'status' => 'draft',
            ],
            [
                'code' => 'UI003',
                'name' => 'UI Design',
                'description' => 'Mempelajari desain antarmuka pengguna.',
                'fee' => 150000,
                'quota' => 20,
                'start_date' => '2026-12-09',
                'status' => 'open',
            ],
            [
                'code' => 'UX003',
                'name' => 'UX Research',
                'description' => 'Mempelajari riset pengalaman pengguna.',
                'fee' => 175000,
                'quota' => 15,
                'start_date' => '2026-12-10',
                'status' => 'closed',
            ],
            [
                'code' => 'GIT003',
                'name' => 'Git Lanjutan',
                'description' => 'Mempelajari version control lanjutan.',
                'fee' => 100000,
                'quota' => 20,
                'start_date' => '2026-12-11',
                'status' => 'open',
            ],
            [
                'code' => 'BOOT003',
                'name' => 'Bootstrap Dasar',
                'description' => 'Mempelajari framework Bootstrap.',
                'fee' => 125000,
                'quota' => 20,
                'start_date' => '2026-12-12',
                'status' => 'draft',
            ],
            [
                'code' => 'API003',
                'name' => 'REST API Dasar',
                'description' => 'Mempelajari pembuatan REST API.',
                'fee' => 225000,
                'quota' => 15,
                'start_date' => '2026-12-13',
                'status' => 'closed',
            ],
        ];

        // Menambahkan kursus tanpa menggandakan kode yang sudah ada
        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['code' => $course['code']],
                $course
            );
        }
    }
}
