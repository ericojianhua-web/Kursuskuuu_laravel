
@extends('layouts.app')

@section('title', 'Edit Kursus - KursusKu')

@section('content')

<style>
    .kk-course-edit {
        --bg: #071426;
        --panel: #10243d;
        --border: rgba(100, 181, 246, .18);
        --blue: #2563eb;
        --cyan: #22d3ee;
        --text: #eaf6ff;
        --muted: #a7bad0;

        min-height: 100vh;
        padding: 55px 15px;
        background:
            radial-gradient(circle at top right, rgba(37, 99, 235, .16), transparent 35%),
            #071426;
        color: var(--text);
    }

    .kk-course-edit .edit-wrapper {
        max-width: 850px;
        margin: auto;
    }

    .kk-course-edit .edit-heading {
        margin-bottom: 28px;
    }

    .kk-course-edit .edit-label {
        display: inline-block;
        padding: 7px 14px;
        margin-bottom: 14px;
        border: 1px solid rgba(34, 211, 238, .3);
        border-radius: 30px;
        background: rgba(34, 211, 238, .08);
        color: var(--cyan);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .kk-course-edit .edit-heading h2 {
        color: var(--text);
        font-size: clamp(26px, 4vw, 36px);
        font-weight: 800;
        margin-bottom: 10px;
    }

    .kk-course-edit .edit-heading p {
        color: var(--muted);
        margin: 0;
    }

    .kk-course-edit .edit-card {
        padding: 32px;
        border: 1px solid var(--border);
        border-radius: 20px;
        background: linear-gradient(145deg, #10243d, #0b1b30);
        box-shadow: 0 20px 50px rgba(0, 0, 0, .25);
    }

    .kk-course-edit .section-title {
        color: var(--cyan);
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 22px;
    }

    .kk-course-edit .form-label {
        color: var(--text);
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 9px;
    }

    .kk-course-edit .form-control,
    .kk-course-edit .form-select {
        min-height: 46px;
        border: 1px solid rgba(148, 180, 210, .22);
        border-radius: 10px;
        background-color: #091a2e;
        color: var(--text);
        padding: 11px 14px;
    }

    .kk-course-edit textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .kk-course-edit .form-control:focus,
    .kk-course-edit .form-select:focus {
        border-color: var(--cyan);
        background-color: #091a2e;
        color: var(--text);
        box-shadow: 0 0 0 3px rgba(34, 211, 238, .12);
    }

    .kk-course-edit .form-control::placeholder {
        color: #71869e;
    }

    .kk-course-edit .form-select option {
        background: #10243d;
        color: var(--text);
    }

    .kk-course-edit input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        filter: invert(1);
    }

    .kk-course-edit .form-text {
        color: var(--muted);
        font-size: 12px;
    }

    .kk-course-edit .invalid-feedback {
        color: #ff8d9b;
    }

    .kk-course-edit .form-control.is-invalid,
    .kk-course-edit .form-select.is-invalid {
        border-color: #ff647c;
    }

    .kk-course-edit .edit-divider {
        height: 1px;
        margin: 28px 0;
        background: var(--border);
    }

    .kk-course-edit .btn-back {
        padding: 11px 20px;
        border: 1px solid rgba(148, 180, 210, .35);
        border-radius: 10px;
        color: var(--muted);
        text-decoration: none;
        transition: .25s;
    }

    .kk-course-edit .btn-back:hover {
        border-color: var(--cyan);
        color: var(--cyan);
        background: rgba(34, 211, 238, .06);
    }

    .kk-course-edit .btn-save {
        padding: 11px 23px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--blue), #0891b2);
        color: white;
        font-weight: 700;
        box-shadow: 0 8px 22px rgba(37, 99, 235, .25);
        transition: .25s;
    }

    .kk-course-edit .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(34, 211, 238, .22);
    }

    @media (max-width: 576px) {
        .kk-course-edit {
            padding: 35px 12px;
        }

        .kk-course-edit .edit-card {
            padding: 22px 17px;
        }

        .kk-course-edit .edit-actions {
            flex-direction: column-reverse;
            gap: 14px;
        }

        .kk-course-edit .edit-actions a,
        .kk-course-edit .edit-actions button {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="kk-course-edit">
    <div class="edit-wrapper">

        <div class="edit-heading">
            <span class="edit-label">✦ PENGELOLAAN KURSUS</span>
            <h2>Edit Kursus</h2>
            <p>
                Perbarui informasi kursus
                <strong>{{ $course->name }}</strong>
                melalui formulir berikut.
            </p>
        </div>

        <div class="edit-card">

            <div class="section-title">
                <i class="bi bi-pencil-square me-2"></i>
                Informasi Kursus
            </div>

            <form action="{{ route('courses.update', $course) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="code" class="form-label">Kode Kursus</label>
                    <input
                        type="text"
                        class="form-control @error('code') is-invalid @enderror"
                        id="code"
                        name="code"
                        value="{{ old('code', $course->code) }}"
                        maxlength="20"
                        placeholder="Contoh: KRS001"
                        required
                    >
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="form-label">Nama Kursus</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name', $course->name) }}"
                        maxlength="120"
                        placeholder="Masukkan nama kursus"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Deskripsi Kursus</label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"
                        rows="4"
                        placeholder="Jelaskan materi atau tujuan kursus..."
                    >{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="edit-divider"></div>

                <div class="section-title">
                    <i class="bi bi-gear me-2"></i>
                    Biaya dan Kapasitas
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="fee" class="form-label">Biaya Kursus (Rp)</label>
                        <input
                            type="number"
                            class="form-control @error('fee') is-invalid @enderror"
                            id="fee"
                            name="fee"
                            value="{{ old('fee', $course->fee) }}"
                            min="0"
                            placeholder="Contoh: 150000"
                            required
                        >
                        @error('fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="quota" class="form-label">Kuota Peserta</label>
                        <input
                            type="number"
                            class="form-control @error('quota') is-invalid @enderror"
                            id="quota"
                            name="quota"
                            value="{{ old('quota', $course->quota) }}"
                            min="1"
                            max="500"
                            placeholder="Contoh: 30"
                            required
                        >
                        @error('quota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="edit-divider"></div>

                <div class="section-title">
                    <i class="bi bi-calendar-event me-2"></i>
                    Jadwal dan Status
                </div>

                <div class="mb-4">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input
                        type="date"
                        class="form-control @error('start_date') is-invalid @enderror"
                        id="start_date"
                        name="start_date"
                        value="{{ old('start_date', $course->start_date?->format('Y-m-d')) }}"
                        required
                    >
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status Kursus</label>
                    <select
                        class="form-select @error('status') is-invalid @enderror"
                        id="status"
                        name="status"
                        required
                    >
                        <option value="draft" @selected(old('status', $course->status) === 'draft')>
                            Draft
                        </option>

                        <option value="open" @selected(old('status', $course->status) === 'open')>
                            Open
                        </option>

                        <option value="closed" @selected(old('status', $course->status) === 'closed')>
                            Closed
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="edit-divider"></div>

                <div class="d-flex justify-content-between align-items-center edit-actions">
                    <a href="{{ route('courses.show', $course) }}" class="btn-back">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali
                    </a>

                    <button type="submit" class="btn-save">
                        <i class="bi bi-check-circle me-2"></i>
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection
