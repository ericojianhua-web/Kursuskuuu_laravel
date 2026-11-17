
@extends('layouts.app')

@section('title', 'Laporan Pendaftaran')

@section('content')
<div class="container cyber-page">

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="cyber-title">ENROLLMENT DATABASE</h2>
            <p class="cyber-subtitle mb-0">
                Sistem laporan peserta kursus KursusKu
            </p>
        </div>

        <a href="{{ route('enrollments.create') }}" class="btn btn-neon">
            + Pendaftaran Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="cyber-card">

        <div class="cyber-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1">Data Pendaftaran</h5>
                <small>Daftar peserta yang mengikuti kursus</small>
            </div>

            <span class="badge bg-info text-dark">
                TOTAL: {{ $enrollments->count() }}
            </span>
        </div>

        <div class="cyber-body">

            <div class="table-responsive">
                <table class="table table-bordered cyber-table align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Nama Kursus</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $enrollment->participant->name }}
                                </td>

                                <td>
                                    {{ $enrollment->participant->email }}
                                </td>

                                <td>
                                    {{ $enrollment->course->name }}
                                </td>

                                <td>
                                    {{ $enrollment->course->start_date
                                        ? $enrollment->course->start_date->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>
                                    <span class="cyber-status">
                                        {{ ucfirst($enrollment->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center cyber-empty">
                                    Belum ada data pendaftaran kursus.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
