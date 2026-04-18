@extends('layouts.app')
@section('content')
<h2 class="fw-bold mb-4">Assign New Task</h2>
<div class="card p-4 col-md-8 mx-auto">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label class="form-label">Project</label><select name="project_id" class="form-select">@foreach($projects as $p)<option value="{{$p->id}}">{{$p->name}}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Assign To</label><select name="employee_id" class="form-select">@foreach($employees as $e)<option value="{{$e->id}}">{{$e->full_name}}</option>@endforeach</select></div>
        <div class="mb-3"><label class="form-label">Task Title</label><input type="text" name="title" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Status</label><select name="status" class="form-select"><option value="pending">Pending</option><option value="in_progress">In Progress</option><option value="completed">Completed</option></select></div>
        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Assign Task</button>
    </form>
</div>
@endsection
