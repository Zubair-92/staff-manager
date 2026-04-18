@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Active Projects</h2>
    <a href="{{ route('projects.create') }}" class="btn btn-dark rounded-pill px-4"><i class="bi bi-plus-lg"></i> New Project</a>
</div>
<div class="row g-4">
    @forelse($projects as $proj)
    <div class="col-md-4">
        <div class="card p-4">
            <h5 class="fw-bold">{{ $proj->name }}</h5>
            <p class="text-muted small">{{ Str::limit($proj->description, 100) }}</p>
            <hr>
            <div class="d-flex justify-content-between">
                <span class="badge bg-info text-dark">Deadline: {{ $proj->deadline }}</span>
                <span class="badge bg-secondary text-capitalize">{{ $proj->status }}</span>
            </div>
        </div>
    </div>
    @empty
    <p class="text-center py-5">No projects started yet.</p>
    @endforelse
</div>
@endsection
