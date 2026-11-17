
@extends('layouts.app')

@section('title', 'Detail Kursus - KursusKu')

@section('content')

<style>
    .kk-course-detail {
        min-height: 100vh;
        padding: 55px 20px;
        color: #eaf6ff;
        background:
            radial-gradient(circle at 10% 10%, rgba(37, 99, 235, .18), transparent 35%),
            radial-gradient(circle at 90% 80%, rgba(34, 211, 238, .10), transparent 30%),
            #071426;
    }

    .kk-course-detail .detail-wrapper {
        max-width: 950px;
        margin: auto;
    }

    .kk-course-detail .eyebrow {
        display: inline-block;
        padding: 7px 15px;
        margin-bottom: 14px;
        border: 1px solid rgba(34, 211, 238, .35);
        border-radius: 30px;
        background: rgba(34, 211, 238, .08);
        color: #22d3ee;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
    }

    .kk-course-detail .page-heading h2 {
        margin-bottom: 8px;
        color: #fff;
        font-size: clamp(28px, 4vw, 38px);
        font-weight: 800;
    }

    .kk-course-detail .page-heading p {
        color: #9fb3ca;
    }

    .kk-course-detail .detail-card {
        overflow: hidden;
        margin-top: 25px;
        border: 1px solid rgba(96, 165, 250, .2);
        border-radius: 22px;
        background: linear-gradient(145deg, #10243d, #0b1b30);
        box-shadow: 0 20px 55px rgba(0, 0, 0, .3);
    }

    .kk-course-detail .card-top {
        position: relative;
        padding: 30px;
        border-bottom: 1px solid rgba(148, 163, 184, .15);
        background: linear-gradient(110deg, rgba(37, 99, 235, .16), rgba(34, 211, 238, .06));
    }

    .kk-course-detail .course-symbol {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        margin-bottom: 20px;
        border: 1px solid rgba(34, 211, 238, .3);
        border-radius: 18px;
        background: rgba(34, 211, 238, .1);
        color: #22d3ee;
        font-size: 30px;
    }

    .kk-course-detail .course-code {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 12px;
        border: 1px solid rgba(34, 211, 238, .25);
        border-radius: 30px;
        background: rgba(34, 211, 238, .08);
        color: #67e8f9;
        font-size: 12px;
        font-weight: 700;
    }

    .kk-course-detail .card-top h3 {
        margin-bottom: 8px;
        color: #fff;
        font-size: 27px;
        font-weight: 800;
    }

    .kk-course-detail .card-top p {
        margin: 0;
        color: #9fb3ca;
    }

    .kk-course-detail .detail-content {
        padding: 30px;
    }

    .kk-course-detail .section-title {
        margin-bottom: 20px;
        color: #22d3ee;
        font-size: 15px;
        font-weight: 800;
        letter-spacing: .5px;
    }

    .kk-course-detail .info-box {
        height: 100%;
        padding: 20px;
        border: 1px solid rgba(96, 165, 250, .17);
        border-radius: 14px;
        background: rgba(7, 20, 38, .55);
        transition: .25s ease;
    }

    .kk-course-detail .info-box:hover {
        border-color: rgba(34, 211, 238, .4);
        transform: translateY(-3px);
    }

    .kk-course-detail .info-label {
        display: block;
        margin-bottom: 9px;
        color: #8fa8c2;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .7px;
        text-transform: uppercase;
    }

    .kk-course-detail .info-value {
        margin: 0;
        color: #f0f9ff;
        font-size: 18px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .kk-course-detail .price-value {
        color: #22d3ee;
        font-size: 23px;
    }

    .kk-course-detail .description-box {
        padding: 22px;
        border: 1px solid rgba(96, 165, 250, .17);
        border-radius: 14px;
        background: rgba(7, 20, 38, .55);
        color: #cbdcf0;
        line-height: 1.8;
        white-space: pre-line;
    }

    .kk-course-detail .status {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 800;
    }

    .kk-course-detail .status-open {
        border: 1px solid rgba(34, 197, 94, .3);
        background: rgba(34, 197, 94, .12);
        color: #86efac;
    }

    .kk-course-detail .status-closed {
        border: 1px solid rgba(239, 68, 68, .3);
        background: rgba(239, 68, 68, .12);
        color: #fca5a5;
    }

    .kk-course-detail .status-draft {
        border: 1px solid rgba(148, 163, 184, .3);
        background: rgba(148, 163, 184, .12);
        color: #cbd5e1;
    }

    .kk-course-detail .success-alert {
        padding: 15px 18px;
        margin: 22px 0;
        border: 1px solid rgba(34, 197, 94, .3);
        border-radius: 12px;
        background: rgba(22, 163, 74, .12);
        color: #86efac;
    }

    .kk-course-detail .action-area {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid rgba(148, 163, 184, .15);
    }

    .kk-course-detail .btn-back,
    .kk-course-detail .btn-edit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 46px;
        padding: 11px 22px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        transition: .25s ease;
    }

    .kk-course-detail .btn-back {
        border: 1px solid #45617f;
        background: transparent;
        color: #cbdcf0;
    }

    .kk-course-detail .btn-back:hover {
        border-color: #22d3ee;
        color: #22d3ee;
    }

    .kk-course-detail .btn-edit {
        border: none;
        background: linear-gradient(100deg, #2563eb, #22d3ee);
        color: #061525;
    }

    .kk-course-detail .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(34, 211, 238, .2);
        color: #061525;
    }

    @media (max-width: 576px) {
        .kk-course-detail {
            padding: 35px 14px;
        }

        .kk-course-detail .card-top,
        .kk-course-detail .detail-content {
            padding: 22px 18px;
        }

        .kk-course-detail .action-area {
            flex-direction: column-reverse;
        }

        .kk-course-detail .btn-back,
        .kk-course-detail .btn-edit {
            width: 100%;
        }
    }
</style>

<div class="kk-course-detail">
    <div class="detail-wrapper">

        <div class="page-heading">
            <span class="eyebrow">KURSUSKU MANAGEMENT</span>
            <h2>Detail Kursus</h2>
            <p>Informasi lengkap mengenai program pembelajaran KursusKu.</p>
        </div>

        @if (session('success'))
            <div class="success-alert">
                <strong>✓ Berhasil!</strong>
                {{ session('success') }}

                <button type="button"
                        class="btn-close float-end"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>
        @endif

        <div class="detail-card">

            <div class="card-top">
                <div class="course-symbol">✦</div>

                <span class="course-code">
                    {{ $course->code }}
                </span>

                <h3>{{ $course->name }}</h3>

                <p>Program pembelajaran resmi dari KursusKu.</p>
            </div>

            <div class="detail-content">

                <div class="section-title">
                    ✦ Informasi Utama
                </div>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-label">Kode Kursus</span>
                            <p class="info-value">{{ $course->code }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-label">Nama Kursus</span>
                            <p class="info-value">{{ $course->name }}</p>
                        </div>
                    </div>

                </div>

                <div class="section-title">
                    ✦ Deskripsi Program
                </div>

                <div class="description-box mb-4">
                    {{ $course->description ?: 'Belum ada deskripsi untuk kursus ini.' }}
                </div>

                <div class="section-title">
                    ✦ Biaya dan Kapasitas
                </div>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-label">Biaya Kursus</span>
                            <p class="info-value price-value">
                                Rp{{ number_format($course->fee, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-label">Kuota Peserta</span>
                            <p class="info-value">
                                {{ $course->quota }} Peserta
                            </p>
                        </div>
                    </div>

                </div>

                <div class="section-title">
                    ✦ Jadwal dan Status
                </div>

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-label">Tanggal Mulai</span>
                            <p class="info-value">
                                {{ $course->start_date->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-label">Status Kursus</span>

                            @if ($course->status === 'open')
                                <span class="status status-open">● Open</span>
                            @elseif ($course->status === 'closed')
                                <span class="status status-closed">● Closed</span>
                            @else
                                <span class="status status-draft">● Draft</span>
                            @endif

                        </div>
                    </div>

                </div>

                <div class="action-area">

                    <a href="{{ route('courses.index') }}" class="btn-back">
                        ← Kembali ke Daftar
                    </a>

                    <a href="{{ route('courses.edit', $course) }}" class="btn-edit">
                        ✎ Edit Kursus
                    </a>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
