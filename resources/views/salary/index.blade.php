@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Payroll Management</h2>
    <form action="{{ route('salary.generate') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success rounded-pill px-4">Generate Current Month Salaries</button>
    </form>
</div>
<div class="card p-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light"><tr><th>Staff</th><th>Month/Year</th><th>Amount</th><th>Status</th></tr></thead>
            <tbody>
                @foreach($salaries as $sal)
                <tr>
                    <td>{{ $sal->employee->full_name }}</td>
                    <td>{{ date("F", mktime(0, 0, 0, $sal->month, 10)) }} {{ $sal->year }}</td>
                    <td class="fw-bold">${{ number_format($sal->amount, 2) }}</td>
                    <td><span class="badge {{ $sal->status == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $sal->status }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
