@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Staff Attendance</h2>
    <span class="badge bg-dark rounded-pill px-3 py-2">{{ date('d M Y') }}</span>
</div>
<div class="card p-4">
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Employee</th><th>Status</th><th>Clock In</th><th>Clock Out</th></tr></thead>
                <tbody>
                    @foreach($employees as $emp)
                    <tr>
                        <td>{{ $emp->full_name }} <input type="hidden" name="attendance[{{ $loop->index }}][employee_id]" value="{{ $emp->id }}"></td>
                        <td>
                            <select name="attendance[{{ $loop->index }}][status]" class="form-select form-select-sm rounded-pill">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="leave">Leave</option>
                            </select>
                        </td>
                        <td><input type="time" name="attendance[{{ $loop->index }}][clock_in]" class="form-control form-control-sm" value="09:00"></td>
                        <td><input type="time" name="attendance[{{ $loop->index }}][clock_out]" class="form-control form-control-sm" value="18:00"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill px-5 mt-3">Submit Daily Attendance</button>
    </form>
</div>
@endsection
