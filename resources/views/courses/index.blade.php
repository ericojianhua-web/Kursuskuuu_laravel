
@extends('layouts.app')

@section('title', 'Daftar Kursus - KursusKu')

@section('content')

<style>
    .kk-course-list {
        min-height: 100vh;
        padding: 35px 15px;
        color: #e2e8f0;
    }

    .list-wrapper {
        max-width: 1250px;
        margin: 0 auto;
    }

    .eyebrow {
        color: #38bdf8;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .page-heading {
        color: #f8fafc;
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .page-description {
        color: #94a3b8;
        margin-bottom: 25px;
    }

    .btn-add {
        display: inline-block;
        background: linear-gradient(135deg, #2563eb, #0891b2);
        color: white;
        padding: 11px 18px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        border: none;
        transition: 0.2s;
    }

    .btn-add:hover {
        color: white;
        opacity: 0.85;
        transform: translateY(-2px);
    }

    .success-alert {
        background: rgba(34, 197, 94, 0.12);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #86efac;
        padding: 14px 18px;
        border-radius: 10px;
        margin: 20px 0;
    }

    .search-card {
        background: #172554;
        border: 1px solid #334155;
        border-radius: 14px;
        padding: 20px;
        margin: 25px 0;
    }

    .search-card label {
        display: block;
        color: #cbd5e1;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .search-card .form-control,
    .search-card .form-select {
        background: #0f172a;
        color: #f8fafc;
        border: 1px solid #475569;
        border-radius: 8px;
        min-height: 43px;
    }

    .search-card .form-control:focus,
    .search-card .form-select:focus {
        background: #0f172a;
        color: white;
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.15);
    }

    .search-card .form-control::placeholder {
        color: #64748b;
    }

    .search-card .form-select option {
        background: #0f172a;
        color: #f8fafc;
    }

    .btn-search {
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 700;
        min-height: 43px;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-search:hover {
        background: #1d4ed8;
    }

    .btn-reset {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #334155;
        color: #e2e8f0;
        border-radius: 8px;
        padding: 10px 18px;
        min-height: 43px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-reset:hover {
        background: #475569;
        color: white;
    }

    .table-card {
        background: #172554;
        border: 1px solid #334155;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .table-header {
        padding: 20px 22px;
        border-bottom: 1px solid #334155;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .table-header h4 {
        color: #f8fafc;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .table-header span {
        color: #94a3b8;
        font-size: 13px;
    }

    .table-responsive {
        width: 100%;
    }

    .course-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
        color: #e2e8f0;
    }

    .course-table thead {
        background: #0f172a;
    }

    .course-table th {
        color: #93c5fd;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 13px;
        white-space: nowrap;
        border-bottom: 1px solid #334155;
    }

    .course-table td {
        padding: 16px 13px;
        border-bottom: 1px solid #334155;
        font-size: 13px;
        vertical-align: middle;
    }

    .course-table tbody tr:hover {
        background: rgba(59, 130, 246, 0.08);
    }

    .course-code {
        color: #38bdf8;
        font-weight: 700;
    }

    .course-name {
        color: #f8fafc;
        font-weight: 700;
    }

    .course-fee {
        color: #86efac;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-open {
        background: rgba(34, 197, 94, 0.15);
        color: #86efac;
    }

    .status-closed {
        background: rgba(239, 68, 68, 0.15);
        color: #fca5a5;
    }

    .status-draft {
        background: rgba(234, 179, 8, 0.15);
        color: #fde047;
    }

    .action-group {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-detail {
        background: rgba(59, 130, 246, 0.15);
        color: #93c5fd;
    }

    .btn-detail:hover {
        background: #2563eb;
        color: white;
    }

    .btn-edit {
        background: rgba(234, 179, 8, 0.15);
        color: #fde047;
    }

    .btn-edit:hover {
        background: #ca8a04;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 55px 20px !important;
        color: #94a3b8;
    }

    .empty-icon {
        font-size: 45px;
        margin-bottom: 15px;
    }

    .empty-state h5 {
        color: #f8fafc;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .empty-state p {
        margin-bottom: 20px;
    }

    .table-footer {
        padding: 18px 22px;
        color: #94a3b8;
        font-size: 13px;
        border-top: 1px solid #334155;
    }

    .table-footer strong {
        color: #38bdf8;
    }

    /* PAGINATION BOOTSTRAP 5 */
    .pagination-wrapper {
        padding: 18px 22px;
        border-top: 1px solid #334155;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 6px;
        margin: 0;
        padding: 0;
    }

    .pagination .page-item {
        margin: 0;
    }

    .pagination .page-link {
        min-width: 38px;
        height: 38px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 6px 12px;
        background: #0f172a;
        border: 1px solid #334155;
        border-radius: 8px !important;
        color: #93c5fd;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        box-shadow: none;
    }

    .pagination .page-link:hover {
        background: #2563eb;
        border-color: #2563eb;
        color: white;
    }

    .pagination .page-item.active .page-link {
        background: #2563eb;
        border-color: #2563eb;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        background: #1e293b;
        color: #64748b;
        border-color: #334155;
        opacity: 0.65;
    }

    .pagination .page-link svg {
        width: 16px !important;
        height: 16px !important;
    }

    .btn-home {
        display: inline-block;
        color: #93c5fd;
        text-decoration: none;
        font-weight: 600;
        margin-top: 22px;
    }

    .btn-home:hover {
        color: #38bdf8;
    }

    @media (max-width: 768px) {
        .page-heading {
            font-size: 25px;
        }

        .table-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .search-card {
            padding: 15px;
        }

        .course-table th,
        .course-table td {
            padding: 12px 10px;
        }
    }

    @media (max-width: 576px) {
        .pagination-wrapper {
            padding: 12px 6px;
        }

        .pagination {
            gap: 5px;
        }

        .pagination .page-link {
            min-width: 34px;
            height: 34px;
            padding: 5px 9px;
            font-size: 12px;
        }
    }
</style>

<div class="kk-course-list">
    <div class="list-wrapper">

        <div class="eyebrow">KursusKu Management</div>

        <h1 class="page-heading">Daftar Kursus</h1>

        <p class="page-description">
            Kelola seluruh program kursus yang tersedia di KursusKu.
        </p>

        <a href="{{ route('courses.create') }}" class="btn-add">
            + Tambah Kursus
        </a>

        @if (session('success'))
            <div class="success-alert">
                ✓ {{ session('success') }}
            </div>
        @endif

        {{-- FORM PENCARIAN DAN FILTER --}}
        <div class="search-card">
            <form method="GET" action="{{ route('courses.index') }}">
                <div class="row g-3 align-items-end">

                    <div class="col-md-6">
                        <label for="q">Cari Kursus</label>

                        <input
                            type="text"
                            name="q"
                            id="q"
                            class="form-control"
                            placeholder="Masukkan kode atau nama kursus..."
                            value="{{ $search ?? request('q') }}"
                        >
                    </div>

                    <div class="col-md-3">
                        <label for="status">Filter Status</label>

                        <select name="status" id="status" class="form-select">
                            <option value="">Semua Status</option>

                            <option value="open"
                                {{ ($status ?? request('status')) === 'open' ? 'selected' : '' }}>
                                Dibuka
                            </option>

                            <option value="closed"
                                {{ ($status ?? request('status')) === 'closed' ? 'selected' : '' }}>
                                Ditutup
                            </option>

                            <option value="draft"
                                {{ ($status ?? request('status')) === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn-search">
                            Cari
                        </button>

                        <a href="{{ route('courses.index') }}" class="btn-reset">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>

        {{-- TABEL DATA KURSUS --}}
        <div class="table-card">

            <div class="table-header">
                <h4>Data Kursus</h4>

                <span>
                    Menampilkan {{ $courses->count() }} dari
                    {{ $courses->total() }} kursus
                </span>
            </div>

            <div class="table-responsive">
                <table class="course-table">

                    <thead>
                        <tr>
                            <th>No</th>
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
                                <td>
                                    {{ $courses->firstItem() + $loop->index }}
                                </td>

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
                                    <span class="course-fee">
                                        Rp {{ number_format($course->fee, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td>
                                    {{ $course->quota }}
                                </td>

                                <td>
                                    {{ $course->start_date ? $course->start_date->format('d-m-Y') : '-' }}
                                </td>

                                <td>
                                    @if ($course->status === 'open')
                                        <span class="status-badge status-open">
                                            Dibuka
                                        </span>
                                    @elseif ($course->status === 'closed')
                                        <span class="status-badge status-closed">
                                            Ditutup
                                        </span>
                                    @else
                                        <span class="status-badge status-draft">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="action-group">

                                        <a
                                            href="{{ route('courses.show', $course) }}"
                                            class="btn-action btn-detail"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('courses.edit', $course) }}"
                                            class="btn-action btn-edit"
                                        >
                                            Edit
                                        </a>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="empty-state">

                                    <div class="empty-icon">📚</div>

                                    @if (($search ?? '') !== '' || ($status ?? '') !== '')

                                        <h5>Kursus Tidak Ditemukan</h5>

                                        <p>
                                            Tidak ada kursus yang sesuai dengan pencarian
                                            atau filter yang dipilih.
                                        </p>

                                        <a href="{{ route('courses.index') }}" class="btn-add">
                                            Reset Pencarian
                                        </a>

                                    @else

                                        <h5>Belum Ada Data Kursus</h5>

                                        <p>
                                            Silakan tambahkan kursus baru untuk mulai
                                            mengelola program pembelajaran.
                                        </p>

                                        <a href="{{ route('courses.create') }}" class="btn-add">
                                            + Tambah Kursus
                                        </a>

                                    @endif

                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- INFORMASI TOTAL DATA --}}
            <div class="table-footer">
                Menampilkan
                <strong>{{ $courses->firstItem() ?? 0 }}</strong>
                sampai
                <strong>{{ $courses->lastItem() ?? 0 }}</strong>
                dari
                <strong>{{ $courses->total() }}</strong>
                data kursus.
            </div>

            {{-- PAGINATION BOOTSTRAP 5 --}}
            @if ($courses->hasPages())
                <div class="pagination-wrapper">
                    {{ $courses->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>

        <div>
            <a href="{{ route('home') }}" class="btn-home">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@endsection
