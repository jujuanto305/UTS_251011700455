@extends('layouts.app')

@section('title', $job->title)

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Lowongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $job->title }}</li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card job-card shadow-sm">
                <img src="{{ asset($job->image) }}" class="card-img-top" style="height:220px" alt="{{ $job->type }}">
                <div class="card-body p-4">
                    <span class="badge text-bg-light border mb-2">{{ $job->type }}</span>
                    <h1 class="h3">{{ $job->title }}</h1>
                    <p class="fw-semibold text-teal mb-4">{{ $job->company }}</p>

                    <h2 class="h5">Deskripsi pekerjaan</h2>
                    <p>{{ $job->description }}</p>

                    <h2 class="h5 mt-4">Persyaratan</h2>
                    <ul>
                        @foreach ($job->requirement_list as $req)
                            <li>{{ $req }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card job-card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="h5 mb-3">Ringkasan</h2>
                    <table class="table table-sm mb-3">
                        <tr><th scope="row">Perusahaan</th><td>{{ $job->company }}</td></tr>
                        <tr><th scope="row">Lokasi</th><td>{{ $job->location }}</td></tr>
                        <tr><th scope="row">Tipe</th><td>{{ $job->type }}</td></tr>
                        <tr><th scope="row">Gaji</th><td class="salary">{{ $job->salary_formatted }}</td></tr>
                        <tr><th scope="row">Diposting</th><td>{{ $job->posted_date->translatedFormat('d F Y') }}</td></tr>
                    </table>
                    <div class="d-grid gap-2">
                        <button class="btn btn-teal" type="button" data-bs-toggle="modal" data-bs-target="#applyModal">
                            Lamar sekarang
                        </button>
                        <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
                    </div>
                </div>
            </div>

            @if ($related->isNotEmpty())
                <div class="card job-card shadow-sm">
                    <div class="card-header bg-white fw-semibold">Lowongan {{ $job->type }} lainnya</div>
                    <div class="list-group list-group-flush">
                        @foreach ($related as $r)
                            <a href="{{ route('jobs.show', $r) }}" class="list-group-item list-group-item-action">
                                <div class="fw-semibold">{{ $r->title }}</div>
                                <small class="text-muted">{{ $r->company }} &middot; {{ $r->location }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title h5">Lamar: {{ $job->title }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    Kirim CV dan portofoliomu ke tim rekrutmen {{ $job->company }}.
                    (Fitur kirim lamaran belum aktif pada versi frontend ini.)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
