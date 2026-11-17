
@extends('layouts.app')

@section('title', 'Tambah Kursus - KursusKu')

@section('content')

<style>
    .kk-course-create {
        min-height: 100vh;
        padding: 55px 20px;
        background:
            radial-gradient(circle at 10% 10%, rgba(37, 99, 235, .18), transparent 35%),
            radial-gradient(circle at 90% 80%, rgba(34, 211, 238, .10), transparent 30%),
            #071426;
        color: #eaf6ff;
    }

    .kk-course-create .form-wrapper {
        max-width: 850px;
        margin: auto;
    }

    .kk-course-create .page-heading {
        margin-bottom: 30px;
    }

    .kk-course-create .eyebrow {
        display: inline-block;
        padding: 7px 15px;
        margin-bottom: 15px;
        border: 1px solid rgba(34, 211, 238, .35);
        border-radius: 30px;
        background: rgba(34, 211, 238, .08);
        color: #22d3ee;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
    }

    .kk-course-create .page-heading h2 {
        margin-bottom: 10px;
        color: #ffffff;
        font-size: clamp(28px, 5vw, 38px);
        font-weight: 800;
    }

    .kk-course-create .page-heading p {
        color: #9fb3ca;
        margin: 0;
    }

    .kk-course-create .form-card {
        padding: 35px;
        border: 1px solid rgba(96, 165, 250, .2);
        border-radius: 22px;
        background: linear-gradient(145deg, #10243d, #0b1b30);
        box-shadow: 0 20px 55px rgba(0, 0, 0, .3);
    }

    .kk-course-create .section-title {
        margin-bottom: 25px;
        color: #22d3ee;
        font-size: 17px;
        font-weight: 700;
    }

    .kk-course-create .form-label {
        margin-bottom: 9px;
        color: #dcecff;
        font-size: 14px;
        font-weight: 600;
    }

    .kk-course-create .form-control,
    .kk-course-create .form-select {
        min-height: 48px;
        padding: 12px 15px;
        border: 1px solid #29415e;
        border-radius: 10px;
        background-color: #09182a;
        color: #eaf6ff;
        box-shadow: none;
    }

    .kk-course-create textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .kk-course-create .form-control::placeholder {
        color: #71869e;
    }

    .kk-course-create .form-control:focus,
    .kk-course-create .form-select:focus {
        border-color: #22d3ee;
        background-color: #0b1d32;
        color: #ffffff;
        box-shadow: 0 0 0 3px rgba(34, 211, 238, .12);
    }

    .kk-course-create .form-select option {
        background: #10243d;
        color: #ffffff;
    }

    .kk-course-create .form-control.is-invalid,
    .kk-course-create .form-select.is-invalid {
        border-color: #ef4444;
    }

    .kk-course-create .invalid-feedback {
        color: #fca5a5;
    }

    .kk-course-create .form-divider {
        height: 1px;
        margin: 28px 0;
        background: rgba(148, 163, 184, .17);
    }

    .kk-course-create .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-top: 30px;
    }

    .kk-course-create .btn-back,
    .kk-course-create .btn-save {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        min-height: 46px;
        padding: 11px 22px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        transition: .25s ease;
    }

    .kk-course-create .btn-back {
        border: 1px solid #45617f;
        color: #cbdcf0;
        background: transparent;
    }

    .kk-course-create .btn-back:hover {
        border-color: #22d3ee;
        color: #22d3ee;
    }

    .kk-course-create .btn-save {
        border: none;
        color: #061525;
        background: linear-gradient(100deg, #2563eb, #22d3ee);
        box-shadow: 0 7px 20px rgba(34, 211, 238, .15);
    }

    .kk-course-create .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(34, 211, 238, .25);
    }

    @media (max-width: 576px) {
        .kk-course-create {
            padding: 35px 14px;
        }

        .kk-course-create .form-card {
            padding: 22px 18px;
        }

        .kk-course-create .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .kk-course-create .btn-back,
        .kk-course-create .btn-save {
            width: 100%;
        }
    }
</style>

<div class="kk-course-create">
    <div class="form-wrapper">

        <div class="page-heading">
            <span class="eyebrow">KURUSKU MANAGEMENT</span>
            <h2>Tambah Kursus Baru</h2>
            <p>Tambahkan program pembelajaran baru ke dalam platform KursusKu.</p>
        </div>

        <div class="form-card">

            <div class="section-title">
                ✦ Informasi Kursus
            </div>

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="code" class="form-label">Kode Kursus</label>
                        <input
                            type="text"
                            id="code"
                            name="code"
                            class="form-control @error('code') is-invalid @enderror"
                            value="{{ old('code') }}"
                            placeholder="Contoh: KRS001"
                            required
                        >
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama Kursus</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Laravel Dasar"
                            required
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Deskripsi Kursus</label>
                        <textarea
                            id="description"
                            name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Jelaskan materi yang akan dipelajari..."
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-divider"></div>

                <div class="section-title">
                    ✦ Biaya dan Kuota
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="fee" class="form-label">Biaya Kursus (Rp)</label>
                        <input
                            type="number"
                            id="fee"
                            name="fee"
                            class="form-control @error('fee') is-invalid @enderror"
                            value="{{ old('fee') }}"
                            placeholder="Contoh: 150000"
                            min="0"
                            required
                        >
                        @error('fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="quota" class="form-label">Kuota Peserta</label>
                        <input
                            type="number"
                            id="quota"
                            name="quota"
                            class="form-control @error('quota') is-invalid @enderror"
                            value="{{ old('quota') }}"
                            placeholder="Contoh: 30"
                            min="1"
                            required
                        >
                        @error('quota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-divider"></div>

                <div class="section-title">
                    ✦ Jadwal dan Status
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date') }}"
                            required
                        >
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status Kursus</label>
                        <select
                            id="status"
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required
                        >
                            <option value="">-- Pilih Status --</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Dibuka</option>
                            <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Ditutup</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{ route('courses.index') }}" class="btn-back">
                        ← Kembali
                    </a>

                    <button type="submit" class="btn-save">
                        + Simpan Kursus
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
