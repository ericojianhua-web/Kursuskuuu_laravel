
@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')

<style>
    .kk-course-list {
        min-height: 100vh;
        padding: 55px 20px;
        color: #eaf6ff;
        background:
            radial-gradient(circle at 10% 10%, rgba(37, 99, 235, .18), transparent 35%),
            radial-gradient(circle at 90% 80%, rgba(34, 211, 238, .10), transparent 30%),
            #071426;
    }

    .kk-course-list .list-wrapper {
        max-width: 1400px;
        margin: auto;
    }

    .kk-course-list .eyebrow {
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

    .kk-course-list .page-heading h2 {
        margin-bottom: 8px;
        color: #fff;
        font-size: clamp(28px, 4vw, 38px);
        font-weight: 800;
    }

    .kk-course-list .page-heading p {
        color: #9fb3ca;
    }

    .kk-course-list .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 20px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(100deg, #2563eb, #22d3ee);
        color: #061525;
        font-weight: 800;
        text-decoration: none;
        transition: .25s ease;
        white-space: nowrap;
    }

    .kk-course-list .btn-add:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(34, 211, 238, .2);
        color: #061525;
    }

    .kk-course-list .success-alert {
        padding: 15px 18px;
        margin: 22px 0;
        border: 1px solid rgba(34, 197, 94, .3);
        border-radius: 12px;
        background: rgba(22, 163, 74, .12);
        color: #86efac;
    }

    .kk-course-list .table-card {
        overflow: hidden;
        margin-top: 28px;
        border: 1px solid rgba(96, 165, 250, .2);
        border-radius: 20px;
        background: linear-gradient(145deg, #10243d, #0b1b30);
        box-shadow: 0 20px 55px rgba(0, 0, 0, .25);
    }

    .kk-course-list .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding: 22px 25px;
        border-bottom: 1px solid rgba(148, 163, 184, .15);
    }

    .kk-course-list .table-header h5 {
        margin: 0;
        color: #fff;
        font-weight: 700;
    }

    .kk-course-list .table-header span {
        color: #8fa8c2;
        font-size: 13px;
    }

    .kk-course-list .table-responsive {
        padding: 10px 18px;
    }

    .kk-course-list table {
        width: 100%;
        min-width: 1050px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        color: #dcecff;
        vertical-align: middle;
    }

    .kk-course-list table thead th {
        padding: 17px 13px;
        border-bottom: 1px solid rgba(34, 211, 238, .2);
        background: rgba(34, 211, 238, .06);
        color: #22d3ee;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .7px;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .kk-course-list table tbody td {
        padding: 17px 13px;
        border-bottom: 1px solid rgba(148, 163, 184, .1);
        background: transparent;
        color: #cbdcf0;
        font-size: 13px;
    }

    .kk-course-list table tbody tr:last-child td {
        border-bottom: none;
    }

    .kk-course-list table tbody tr {
        transition: .2s ease;
    }

    .kk-course-list table tbody tr:hover td {
        background: rgba(34, 211, 238, .045);
    }

    .kk-course-list .course-code {
        display: inline-block;
        padding: 6px 10px;
        border: 1px solid rgba(34, 211, 238, .2);
        border-radius: 7px;
        background: rgba(34, 211, 238, .08);
        color: #67e8f9;
        font-weight: 700;
    }

    .kk-course-list .course-name {
        color: #fff;
        font-weight: 700;
    }

    .kk-course-list .status {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
    }

    .kk-course-list .status-open {
        border: 1px solid rgba(34, 197, 94, .3);
        background: rgba(34, 197, 94, .12);
        color: #86efac;
    }

    .kk-course-list .status-closed {
        border: 1px solid rgba(239, 68, 68, .3);
        background: rgba(239, 68, 68, .12);
        color: #fca5a5;
    }

    .kk-course-list .status-draft {
        border: 1px solid rgba(148, 163, 184, .3);
        background: rgba(148, 163, 184, .12);
        color: #cbd5e1;
    }

    .kk-course-list .action-group {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .kk-course-list .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 11px;
        border: 1px solid transparent;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
        cursor: pointer;
    }

    .kk-course-list .btn-detail {
        border-color: rgba(34, 211, 238, .3);
        background: rgba(34, 211, 238, .1);
        color: #67e8f9;
    }

    .kk-course-list .btn-edit {
        border-color: rgba(251, 191, 36, .3);
        background: rgba(251, 191, 36, .1);
        color: #fcd34d;
    }

    .kk-course-list .btn-delete {
        border-color: rgba(239, 68, 68, .3);
        background: rgba(239, 68, 68, .1);
        color: #fca5a5;
    }

    .kk-course-list .action-btn:hover {
        filter: brightness(1.2);
        transform: translateY(-2px);
    }

    .kk-course-list .empty-state {
        padding: 55px 20px !important;
        text-align: center;
        color: #9fb3ca !important;
    }

    .kk-course-list .empty-icon {
        margin-bottom: 15px;
        font-size: 38px;
    }

    .kk-course-list .table-footer {
        padding: 18px 25px;
        border-top: 1px solid rgba(148, 163, 184, .15);
        color: #8fa8c2;
        font-size: 13px;
    }

    .kk-course-list .btn-home {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 17px;
        border: 1px solid #45617f;
        border-radius: 9px;
        color: #cbdcf0;
        text-decoration: none;
        transition: .2s ease;
    }

    .kk-course-list .btn-home:hover {
        border-color: #22d3ee;
        color: #22d3ee;
    }

    @media (max-width: 768px) {
        .kk-course-list {
            padding: 35px 14px;
        }

        .kk-course-list .top-section {
            align-items: flex-start !important;
            flex-direction: column;
        }

        .kk-course-list .btn-add {
            width: 100%;
        }

        .kk-course-list .table-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .kk-course-list .table-responsive {
            padding: 8px;
        }
    }
</style>

<div class="kk-course-list">
    <div class="list-wrapper">

        <div class="top-section d-flex justify-content-between align-items-center gap-3">

            <div class="page-heading">
                <span class="eyebrow">KURSUSKU MANAGEMENT</span>
                <h2>Daftar Kursus</h2>
                <p class="mb-0">
                    Kelola dan pantau seluruh program pembelajaran KursusKu.
                </p>
            </div>

            <a href="{{ route('courses.create') }}" class="btn-add">
                <span>＋</span> Tambah Kursus
            </a>

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

        <div class="table-card">

            <div class="table-header">
                <h5>✦ Data Kursus</h5>
                <span>Informasi seluruh kursus yang tersedia</span>
            </div>

            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Kursus</th>
                            <th>Biaya</th>
                            <th>Kuota</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($courses as $course)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="course-code">
                                        {{ $course->code }}
                                    </span>
                                </td>

                                <td>
                                    <span class="course-name">
                                        {{ $course->name }}
                                    </span>
                                </td>

                                <td>
                                    Rp{{ number_format($course->fee, 0, ',', '.') }}
                                </td>

                                <td>{{ $course->quota }} peserta</td>

                                <td>
                                    {{ $course->start_date->format('d/m/Y') }}
                                </td>

                                <td>
                                    @if ($course->status === 'open')
                                        <span class="status status-open">● Open</span>
                                    @elseif ($course->status === 'closed')
                                        <span class="status status-closed">● Closed</span>
                                    @else
                                        <span class="status status-draft">● Draft</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="action-group">

                                        <a href="{{ route('courses.show', $course) }}"
                                           class="action-btn btn-detail">
                                            Detail
                                        </a>

                                        <a href="{{ route('courses.edit', $course) }}"
                                           class="action-btn btn-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('courses.destroy', $course) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn btn-delete">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="empty-state">
                                    <div class="empty-icon">📚</div>
                                    <h5>Belum Ada Data Kursus</h5>
                                    <p class="mb-3">
                                        Silakan tambahkan kursus baru untuk mulai mengelola program pembelajaran.
                                    </p>

                                    <a href="{{ route('courses.create') }}" class="btn-add">
                                        ＋ Tambah Kursus
                                    </a>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="table-footer">
                Total kursus: <strong>{{ $courses->count() }}</strong> data
            </div>

        </div>

        <div class="mt-4">
            <a href="{{ route('home') }}" class="btn-home">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@endsection
