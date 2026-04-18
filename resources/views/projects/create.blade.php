@extends('layouts.app')
@section('content')
<h2 class="fw-bold mb-4">Create New Project</h2>
<div class="card p-4 col-md-8 mx-auto">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label class="form-label">Project Name</label><input type="text" name="name" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3"></textarea></div>
        <div class="mb-3"><label class="form-label">Deadline</label><input type="date" name="deadline" class="form-control" required></div>
        <button type="submit" class="btn btn-success w-100 rounded-pill py-2">Create Project</button>
    </form>
</div>
@endsection
