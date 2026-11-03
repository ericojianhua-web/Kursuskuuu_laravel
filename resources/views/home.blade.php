
@extends('layouts.app')

@section('title', $siteName . ' - Beranda')

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
                <h2>Kursus Unggulan</h2>
                <p>Pilih kursus untuk memulai perjalanan belajarmu.</p>
            </div>

            <div class="course-grid">

                @foreach ($featured as $course)
                    <article class="course-card">

                        <span class="course-code">
                            {{ $course['code'] }}
                        </span>

                        <h3>{{ $course['name'] }}</h3>

                        <p>{{ $course['description'] }}</p>

                    </article>
                @endforeach

            </div>
        </div>
    </section>

@endsection
