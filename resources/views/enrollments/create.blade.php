
@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="container cyber-page">

    <div class="text-center mb-4">
        <h2 class="cyber-title">SYSTEM ENROLLMENT</h2>
        <p class="cyber-subtitle">
            Daftarkan peserta ke program kursus KursusKu
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="cyber-card">

                <div class="cyber-header">
                    <h4 class="mb-1">Form Pendaftaran Kursus</h4>
                    <small>Silakan lengkapi data pendaftaran</small>
                </div>

                <div class="cyber-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Pendaftaran gagal!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('enrollments.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="participant_id" class="form-label">
                                <i class="bi bi-person-circle"></i>
                                Pilih Peserta
                            </label>

                            <select
                                name="participant_id"
                                id="participant_id"
                                class="form-select"
                                required
                            >
                                <option value="">-- Pilih Peserta --</option>

                                @foreach ($participants as $participant)
                                    <option
                                        value="{{ $participant->id }}"
                                        {{ old('participant_id') == $participant->id ? 'selected' : '' }}
                                    >
                                        {{ $participant->name }} - {{ $participant->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="course_id" class="form-label">
                                <i class="bi bi-book"></i>
                                Pilih Kursus
                            </label>

                            <select
                                name="course_id"
                                id="course_id"
                                class="form-select"
                                required
                            >
                                <option value="">-- Pilih Kursus --</option>

                                @foreach ($courses as $course)
                                    <option
                                        value="{{ $course->id }}"
                                        {{ old('course_id') == $course->id ? 'selected' : '' }}
                                    >
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-neon">
                                Daftarkan Peserta
                            </button>

                            <a href="{{ route('enrollments.index') }}"
                               class="btn btn-neon-outline">
                                Lihat Laporan
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
