@extends('layouts.app')

@section('title', 'Daftar Lowongan')

@section('hero')
<section class="hero py-5">
    <div class="container py-3">
        <h1 class="display-5 fw-bold mb-2">Temukan pekerjaan yang cocok untukmu</h1>
        <p class="lead mb-4" style="max-width:36rem">
            {{ $jobs->count() }} lowongan dari perusahaan di seluruh Indonesia, siap kamu lamar hari ini.
        </p>
        <form method="GET" action="{{ route('jobs.index') }}" class="row g-2" style="max-width:48rem">
            <div class="col-md-6">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-lg"
                       placeholder="Posisi, perusahaan, atau kota">
            </div>
            <div class="col-md-3">
                <select name="type" class="form-select form-select-lg">
                    <option value="">Semua tipe</option>
                    @foreach ($types as $t)
                        <option value="{{ $t }}" @selected(request('type') === $t)>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-grid">
                <button class="btn btn-teal btn-lg" type="submit">Cari</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Lowongan terbaru</h2>
        @if (request('q') || request('type'))
            <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-outline-secondary">Hapus filter</a>
        @endif
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($jobs as $job)
            <div class="col">
                <div class="card job-card h-100 shadow-sm">
                    <img src="{{ asset($job->image) }}" class="card-img-top" alt="{{ $job->type }}">
                    <div class="card-body">
                        <span class="badge text-bg-light border mb-2">{{ $job->type }}</span>
                        <h3 class="h5 card-title">{{ $job->title }}</h3>
                        <p class="mb-1 fw-semibold text-teal">{{ $job->company }}</p>
                        <p class="mb-2 text-muted small">{{ $job->location }}</p>
                        <p class="salary mb-0">{{ $job->salary_formatted }} / bulan</p>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $job->posted_date->translatedFormat('d M Y') }}</small>
                        <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-teal">Lihat detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning mb-0">
                    Tidak ada lowongan yang cocok. Ubah kata kunci atau hapus filter.
                </div>
            </div>
        @endforelse
    </div>
@endsection
