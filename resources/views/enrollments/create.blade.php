
@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - ' . $siteName)

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <h2 class="fw-bold mb-2">
                        Formulir Pendaftaran
                    </h2>

                    <p class="text-muted mb-4">
                        Daftarkan dirimu dan mulai belajar bersama KursusKu.
                    </p>

                    {{-- Pesan validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan:</strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form pendaftaran --}}
                    <form
                        action="{{ route('enrollments.preview') }}"
                        method="POST"
                    >

                        @csrf

                        {{-- Nama lengkap --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Masukkan nama lengkap"
                                value="{{ old('name') }}"
                                maxlength="100"
                                required
                            >
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Alamat Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="nama@email.com"
                                value="{{ old('email') }}"
                                maxlength="100"
                                required
                            >
                        </div>

                        {{-- Pilihan kursus --}}
                        <div class="mb-3">
                            <label for="course_id" class="form-label">
                                Pilih Kursus
                            </label>

                            <select
                                name="course_id"
                                id="course_id"
                                class="form-select"
                                required
                            >
                                <option value="">
                                    -- Pilih Kursus --
                                </option>

                                @foreach ($courses as $id => $course)
                                    <option
                                        value="{{ $id }}"
                                        {{ old('course_id') == $id ? 'selected' : '' }}
                                    >
                                        {{ $course['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Informasi ketersediaan kursus --}}
                        <div
                            id="availability"
                            class="alert alert-info d-none"
                            role="alert"
                        >
                            <span id="availability-message"></span>
                        </div>

                        {{-- Tombol pendaftaran --}}
                        <button
                            type="submit"
                            class="btn btn-primary w-100 mt-3"
                        >
                            Lanjutkan Pendaftaran
                        </button>

                        {{-- Tombol kembali --}}
                        <a
                            href="{{ route('home') }}"
                            class="btn btn-outline-secondary w-100 mt-2"
                        >
                            Kembali ke Beranda
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
