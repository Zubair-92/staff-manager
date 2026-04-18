<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaffManager - Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --sidebar-width: 250px; }
        body { background-color: #f8f9fa; }
        .sidebar { width: var(--sidebar-width); height: 100vh; position: fixed; left: 0; top: 0; background: #212529; color: white; padding-top: 20px; z-index: 1000; }
        .sidebar .nav-link { color: rgba(255,255,255,0.8); padding: 12px 20px; font-weight: 500; transition: 0.2s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; background: rgba(255,255,255,0.1); }
        .sidebar .nav-link i { margin-right: 10px; width: 20px; text-align: center; }
        .main-content { margin-left: var(--sidebar-width); padding: 30px; }
        @media (max-width: 991.98px) {
            .sidebar { left: -100%; transition: 0.3s; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0; }
        }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="px-4 mb-4"><h4 class="fw-bold text-info">STAFF PRO</h4></div>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}"><i class="bi bi-people"></i> Employees</a>
        <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}"><i class="bi bi-folder"></i> Projects</a>
        <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}"><i class="bi bi-check2-square"></i> Tasks</a>
        <a class="nav-link {{ request()->routeIs('attendance.*') ? 'active' : '' }}" href="{{ route('attendance.index') }}"><i class="bi bi-calendar-check"></i> Attendance</a>
        <a class="nav-link {{ request()->routeIs('salary.*') ? 'active' : '' }}" href="{{ route('salary.index') }}"><i class="bi bi-cash-stack"></i> Payroll</a>
        <hr class="mx-3 opacity-25">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="nav-link border-0 bg-transparent w-100 text-start" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
    </nav>
</div>

<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
