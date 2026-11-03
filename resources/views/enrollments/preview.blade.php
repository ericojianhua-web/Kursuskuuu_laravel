
@extends('layouts.app')

@section('title', 'Preview Pendaftaran - ' . $siteName)

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4">
                        <div class="text-success mb-3">
                            <h1>✓</h1>
                        </div>

                        <h2 class="fw-bold">
                            Preview Pendaftaran
                        </h2>

                        <p class="text-muted">
                            Periksa kembali data pendaftaran sebelum selesai.
                        </p>
                    </div>

                    <div class="alert alert-success">
                        Data pendaftaran berhasil divalidasi!
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th width="35%">Nama Lengkap</th>
                            <td>{{ $validated['name'] }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $validated['email'] }}</td>
                        </tr>

                        <tr>
                            <th>Kursus</th>
                            <td>{{ $validated['course_name'] }}</td>
                        </tr>
                    </table>

                    <a
                        href="{{ route('enrollments.create') }}"
                        class="btn btn-primary w-100 mt-3"
                    >
                        Kembali ke Formulir
                    </a>

                    <a
                        href="{{ route('home') }}"
                        class="btn btn-outline-secondary w-100 mt-2"
                    >
                        Kembali ke Beranda
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
