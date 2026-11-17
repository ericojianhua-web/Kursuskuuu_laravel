
@extends('layouts.app')

@section('title', 'KursusKu Erik Ajaya - Beranda')

@section('content')

<div class="kk-home">

    {{-- HERO SECTION --}}
    <section class="kk-hero">
        <div class="container">
            <div class="kk-hero-content">

                <div class="kk-hero-text">

                    <span class="kk-label">
                        ✦ PLATFORM PEMBELAJARAN DIGITAL
                    </span>

                    <h1>
                        Belajar Teknologi,
                        <span>Bangun Masa Depan.</span>
                    </h1>

                    <p>
                        Kembangkan kemampuan digitalmu melalui pembelajaran
                        pemrograman yang praktis, interaktif, dan mudah dipahami.
                        Mulai perjalanan suksesmu bersama KursusKu.
                    </p>

                    <div class="kk-hero-buttons">
                        <a href="#kursus" class="kk-btn kk-btn-primary">
                            Jelajahi Kursus →
                        </a>

                        <a href="{{ route('enrollments.create') }}"
                           class="kk-btn kk-btn-outline">
                            Daftar Sekarang
                        </a>
                    </div>

                    <div class="kk-hero-info">
                        <div>
                            <strong>Belajar</strong>
                            <span>Fleksibel</span>
                        </div>

                        <div>
                            <strong>Materi</strong>
                            <span>Praktis</span>
                        </div>

                        <div>
                            <strong>Skill</strong>
                            <span>Masa Depan</span>
                        </div>
                    </div>

                </div>

                {{-- ILUSTRASI KODE --}}
                <div class="kk-hero-visual">

                    <div class="kk-glow"></div>

                    <div class="kk-code-card">

                        <div class="kk-code-header">
                            <span></span>
                            <span></span>
                            <span></span>
                            <p>learning.js</p>
                        </div>

                        <div class="kk-code-content">
                            <p><span>01</span> const future = {</p>
                            <p><span>02</span> &nbsp; skill: "Technology",</p>
                            <p><span>03</span> &nbsp; passion: true,</p>
                            <p><span>04</span> &nbsp; success: "Your Future"</p>
                            <p><span>05</span> };</p>
                            <br>
                            <p><span>06</span> startLearning();</p>
                            <p class="kk-code-success">
                                <span>07</span> // Build your future!
                            </p>
                        </div>

                        <div class="kk-floating-icon">⌘</div>

                    </div>

                    <div class="kk-floating-card">
                        <span>✦</span>
                        <div>
                            <strong>Upgrade Your Skill</strong>
                            <small>Learn something new today</small>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- STATISTIK --}}
    <section class="kk-stats">
        <div class="container">

            <div class="kk-stats-grid">

                <div class="kk-stat-item">
                    <span>01</span>
                    <div>
                        <h3>{{ $featured->count() }}</h3>
                        <p>Kursus Unggulan</p>
                    </div>
                </div>

                <div class="kk-stat-item">
                    <span>02</span>
                    <div>
                        <h3>100%</h3>
                        <p>Fokus Pembelajaran</p>
                    </div>
                </div>

                <div class="kk-stat-item">
                    <span>03</span>
                    <div>
                        <h3>Digital</h3>
                        <p>Keahlian Masa Depan</p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- DAFTAR KURSUS --}}
    <section class="kk-courses" id="kursus">
        <div class="container">

            <div class="kk-section-heading">

                <div>
                    <span class="kk-label">
                        PILIH PERJALANANMU
                    </span>

                    <h2>
                        Jelajahi <span>Kursus Kami.</span>
                    </h2>

                    <p>
                        Temukan materi pembelajaran yang sesuai dengan
                        minat dan tujuan pengembangan kemampuanmu.
                    </p>
                </div>

                <a href="{{ route('enrollments.create') }}"
                   class="kk-view-all">
                    Mulai Belajar →
                </a>

            </div>


            <div class="kk-course-grid">

                @forelse ($featured as $course)

                    <article class="kk-course-card">

                        <div class="kk-course-top">

                            <div class="kk-course-icon">
                                &lt;/&gt;
                            </div>

                            <span class="kk-course-code">
                                {{ $course->code }}
                            </span>

                        </div>

                        <div class="kk-course-body">

                            <h3>{{ $course->name }}</h3>

                            <p>
                                {{ $course->description ?? 'Pelajari keterampilan baru dan tingkatkan kemampuan digitalmu bersama KursusKu.' }}
                            </p>

                            <div class="kk-course-details">

                                <div>
                                    <span>Biaya Kursus</span>
                                    <strong>
                                        Rp{{ number_format($course->fee, 0, ',', '.') }}
                                    </strong>
                                </div>

                                <div>
                                    <span>Kuota</span>
                                    <strong>
                                        {{ $course->quota }} Peserta
                                    </strong>
                                </div>

                            </div>

                            <div class="kk-course-footer">

                                @if ($course->status === 'open')

                                    <span class="kk-status kk-open">
                                        ● Pendaftaran Dibuka
                                    </span>

                                @elseif ($course->status === 'closed')

                                    <span class="kk-status kk-closed">
                                        ● Pendaftaran Ditutup
                                    </span>

                                @else

                                    <span class="kk-status kk-draft">
                                        ● Segera Hadir
                                    </span>

                                @endif

                            </div>

                            @if ($course->status === 'open')

                                <a href="{{ route('enrollments.create') }}"
                                   class="kk-course-button">
                                    Daftar Kursus <span>→</span>
                                </a>

                            @else

                                <button class="kk-course-button" disabled>
                                    Belum Tersedia
                                </button>

                            @endif

                        </div>

                    </article>

                @empty

                    <div class="kk-empty">
                        <h3>Belum Ada Kursus</h3>
                        <p>
                            Kursus akan segera tersedia.
                            Silakan kunjungi kembali nanti.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>


    {{-- CALL TO ACTION --}}
    <section class="kk-cta">
        <div class="container">

            <div class="kk-cta-content">

                <span>✦ WAKTUNYA BERKEMBANG</span>

                <h2>
                    Masa Depan Digital
                    <br>
                    Dimulai Dari Sekarang.
                </h2>

                <p>
                    Jangan hanya menjadi pengguna teknologi.
                    Mulailah belajar untuk menciptakan teknologi.
                </p>

                <a href="{{ route('enrollments.create') }}"
                   class="kk-btn kk-btn-primary">
                    Mulai Perjalananmu →
                </a>

            </div>

        </div>
    </section>

</div>

@endsection
