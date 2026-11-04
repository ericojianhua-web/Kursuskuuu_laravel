
@extends('layouts.app')

@section('title', 'KursusKu Erik Ajaya - Beranda')

@section('content')

    <!-- Hero -->
    <section class="hero">
        <div class="container hero-content">

            <div class="hero-text">
                <h1>Belajar Teknologi, Bangun Masa Depan</h1>

                <p>
                    Tingkatkan kemampuan digitalmu melalui kursus
                    pemrograman yang mudah dipahami dan dipraktikkan.
                    Mulai perjalanan belajarmu bersama KursusKu!
                </p>

                <a href="#kursus" class="btn">Lihat Kursus</a>

                <a href="{{ route('enrollments.create') }}" class="btn">
                    Daftar Sekarang
                </a>
            </div>

            <img
                src="{{ asset('images/hero-kursus.svg') }}"
                alt="Ilustrasi belajar teknologi"
            >

        </div>
    </section>

    <!-- Daftar Kursus -->
    <section class="courses" id="kursus">
        <div class="container">

            <div class="section-title">
                <h2>Daftar Kursus</h2>
                <p>Pilih kursus untuk memulai perjalanan belajarmu.</p>
            </div>

            <div class="course-grid">

                @forelse ($featured as $course)
                    <article class="course-card">

                        <span class="course-code">
                            {{ $course->code }}
                        </span>

                        <h3>{{ $course->name }}</h3>

                        <p>
                            {{ $course->description ?? 'Belum ada deskripsi kursus.' }}
                        </p>

                        <p>
                            <strong>Biaya:</strong>
                            Rp{{ number_format($course->fee, 0, ',', '.') }}
                        </p>

                        <p>
                            <strong>Kuota:</strong>
                            {{ $course->quota }} peserta
                        </p>

                        <p>
                            <strong>Status:</strong>

                            @if ($course->status === 'open')
                                <span class="badge bg-success">Open</span>
                            @elseif ($course->status === 'closed')
                                <span class="badge bg-danger">Closed</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </p>

                        @if ($course->status === 'open')
                            <a href="{{ route('enrollments.create') }}" class="btn">
                                Daftar Sekarang
                            </a>
                        @else
                            <button class="btn" disabled>
                                Belum Tersedia
                            </button>
                        @endif

                    </article>

                @empty
                    <p>Belum ada kursus yang tersedia.</p>
                @endforelse

            </div>
        </div>
    </section>

@endsection
