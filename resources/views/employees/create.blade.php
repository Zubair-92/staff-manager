@extends('layouts.app')
@section('content')
<h2 class="fw-bold mb-4">Add New Employee</h2>
<div class="card p-4 col-md-8 mx-auto">
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label">First Name</label><input type="text" name="first_name" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Last Name</label><input type="text" name="last_name" class="form-control" required></div>
            <div class="col-md-12"><label class="form-label">Email</label><input type="email" name="email" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Role</label><input type="text" name="role" class="form-control" placeholder="e.g. Developer" required></div>
            <div class="col-md-6"><label class="form-label">Joining Date</label><input type="date" name="joining_date" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Basic Salary</label><input type="number" name="salary" class="form-control" required></div>
            <div class="col-md-12 mt-4"><button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Save Employee</button></div>
        </div>
    </form>
</div>
@endsection
