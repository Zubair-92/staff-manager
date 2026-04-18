@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Dashboard Overview</h2>
    <span class="text-muted small fw-bold">{{ date('D, d M Y') }}</span>
</div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card p-4 border-start border-primary border-5">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3"><i class="bi bi-people h3 text-primary mb-0"></i></div>
                <div><h6 class="text-muted mb-0 small fw-bold">Total Staff</h6><h3 class="fw-bold mb-0">{{ $stats['staff'] }}</h3></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-start border-success border-5">
            <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3"><i class="bi bi-folder h3 text-success mb-0"></i></div>
                <div><h6 class="text-muted mb-0 small fw-bold">Projects</h6><h3 class="fw-bold mb-0">{{ $stats['projects'] }}</h3></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-start border-warning border-5">
            <div class="d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3"><i class="bi bi-clock h3 text-warning mb-0"></i></div>
                <div><h6 class="text-muted mb-0 small fw-bold">Pending Tasks</h6><h3 class="fw-bold mb-0">{{ $stats['tasks'] }}</h3></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-start border-info border-5">
            <div class="d-flex align-items-center">
                <div class="bg-info bg-opacity-10 p-3 rounded-3 me-3"><i class="bi bi-calendar-check h3 text-info mb-0"></i></div>
                <div><h6 class="text-muted mb-0 small fw-bold">Present Today</h6><h3 class="fw-bold mb-0">{{ $stats['attendance'] }}</h3></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <div class="card h-100 p-4 border-0 shadow-sm">
            <h5 class="fw-bold mb-4">Recent Task Assignments</h5>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead><tr><th>Task</th><th>Assigned To</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse($stats['recent_tasks'] as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->employee->full_name }}</td>
                            <td><span class="badge bg-primary text-capitalize">{{ $task->status }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center py-4 text-muted">No recent assignments</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 p-4 border-0 shadow-sm">
            <h5 class="fw-bold mb-4 text-info">Active Projects</h5>
            @forelse($stats['active_projects'] as $proj)
            <div class="mb-3 p-3 bg-light rounded-3">
                <h6 class="fw-bold mb-1">{{ $proj->name }}</h6>
                <small class="text-muted">Deadline: {{ $proj->deadline }}</small>
            </div>
            @empty
            <p class="text-muted text-center py-5">No active projects.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
