
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $siteName }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="container">
            <h2>{{ $siteName }}</h2>
        </div>
    </header>

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

    <!-- Footer -->
    <footer class="footer">
        <p>
            &copy; {{ date('Y') }} {{ $siteName }}.
            Semua hak dilindungi.
        </p>
    </footer>

</body>
</html>
