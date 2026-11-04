
@extends('layouts.app')

@section('title', 'Tambah Kursus - KursusKu')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">

            <div class="mb-4">
                <h2 class="fw-bold">Tambah Kursus</h2>
                <p class="text-muted">
                    Masukkan informasi kursus baru ke dalam database KursusKu.
                </p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="code" class="form-label">
                                Kode Kursus
                            </label>

                            <input
                                type="text"
                                class="form-control @error('code') is-invalid @enderror"
                                id="code"
                                name="code"
                                value="{{ old('code') }}"
                                placeholder="Contoh: WEB-101"
                                maxlength="20"
                                required
                            >

                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Kursus
                            </label>

                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Web Dasar"
                                maxlength="120"
                                required
                            >

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Deskripsi Kursus
                            </label>

                            <textarea
                                class="form-control @error('description') is-invalid @enderror"
                                id="description"
                                name="description"
                                rows="3"
                                placeholder="Tuliskan deskripsi kursus..."
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="fee" class="form-label">
                                    Biaya Kursus (Rp)
                                </label>

                                <input
                                    type="number"
                                    class="form-control @error('fee') is-invalid @enderror"
                                    id="fee"
                                    name="fee"
                                    value="{{ old('fee', 0) }}"
                                    min="0"
                                    required
                                >

                                @error('fee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="quota" class="form-label">
                                    Kuota Peserta
                                </label>

                                <input
                                    type="number"
                                    class="form-control @error('quota') is-invalid @enderror"
                                    id="quota"
                                    name="quota"
                                    value="{{ old('quota', 20) }}"
                                    min="1"
                                    max="500"
                                    required
                                >

                                @error('quota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="start_date" class="form-label">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                class="form-control @error('start_date') is-invalid @enderror"
                                id="start_date"
                                name="start_date"
                                value="{{ old('start_date') }}"
                                required
                            >

                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">
                                Status Kursus
                            </label>

                            <select
                                class="form-select @error('status') is-invalid @enderror"
                                id="status"
                                name="status"
                                required
                            >
                                <option value="">-- Pilih Status --</option>

                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>
                                    Open
                                </option>

                                <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>
                                    Closed
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('courses.index') }}"
                               class="btn btn-outline-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Simpan Kursus
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
