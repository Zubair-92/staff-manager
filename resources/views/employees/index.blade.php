@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Employee Directory</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-primary rounded-pill px-4"><i class="bi bi-plus-lg"></i> Add Staff</a>
</div>
<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light"><tr><th>Name</th><th>Role</th><th>Joining Date</th><th>Salary</th><th>Action</th></tr></thead>
            <tbody>
                @forelse($employees as $emp)
                <tr>
                    <td><div class="fw-bold">{{ $emp->full_name }}</div><small class="text-muted">{{ $emp->email }}</small></td>
                    <td><span class="badge bg-secondary">{{ $emp->role }}</span></td>
                    <td>{{ $emp->joining_date }}</td>
                    <td>${{ number_format($emp->salary, 2) }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-4">No employees found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
