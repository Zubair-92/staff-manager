@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Task Assignments</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary rounded-pill px-4"><i class="bi bi-plus-lg"></i> Assign Task</a>
</div>
<div class="card p-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light"><tr><th>Task</th><th>Project</th><th>Assigned To</th><th>Status</th></tr></thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->employee->full_name }}</td>
                    <td><span class="badge bg-primary">{{ $task->status }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
