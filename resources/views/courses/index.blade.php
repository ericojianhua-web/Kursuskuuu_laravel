
@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Daftar Kursus</h2>
            <p class="text-muted mb-0">
                Kelola data kursus KursusKu.
            </p>
        </div>

        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            + Tambah Kursus
        </a>
    </div>

    {{-- Pesan berhasil --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Kursus</th>
                            <th>Biaya</th>
                            <th>Kuota</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($courses as $course)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="fw-semibold">
                                        {{ $course->code }}
                                    </span>
                                </td>

                                <td>{{ $course->name }}</td>

                                <td>
                                    Rp{{ number_format($course->fee, 0, ',', '.') }}
                                </td>

                                <td>{{ $course->quota }} peserta</td>

                                <td>
                                    {{ $course->start_date->format('d/m/Y') }}
                                </td>

                                <td>
                                    @if ($course->status === 'open')
                                        <span class="badge bg-success">Open</span>
                                    @elseif ($course->status === 'closed')
                                        <span class="badge bg-danger">Closed</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <p class="text-muted mb-1">
                                        Belum ada data kursus.
                                    </p>

                                    <small>
                                        Silakan tambahkan kursus baru.
                                    </small>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="text-muted small">
                Total kursus: {{ $courses->count() }} data
            </div>

        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            Kembali ke Beranda
        </a>
    </div>

</div>

@endsection
