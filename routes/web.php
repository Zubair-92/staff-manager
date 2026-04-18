<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use App\Models\Attendance;

Route::get("/", function () {
    return redirect()->route("login");
});

Route::middleware(["auth", "verified"])->group(function () {
    Route::get("/dashboard", function () {
        $stats = [
            "staff" => Employee::count(),
            "projects" => Project::count(),
            "tasks" => Task::where("status", "pending")->count(),
            "attendance" => Attendance::where("date", date("Y-m-d"))->where("status", "present")->count(),
            "recent_tasks" => Task::with(["project", "employee"])->latest()->limit(5)->get(),
            "active_projects" => Project::where("status", "!=", "completed")->latest()->limit(5)->get(),
        ];
        return view("dashboard", compact("stats"));
    })->name("dashboard");

    Route::resource("employees", EmployeeController::class);
    Route::resource("projects", ProjectController::class);
    Route::resource("tasks", TaskController::class);
    Route::get("attendance", [AttendanceController::class, "index"])->name("attendance.index");
    Route::post("attendance/store", [AttendanceController::class, "store"])->name("attendance.store");
    Route::get("salary", [SalaryController::class, "index"])->name("salary.index");
    Route::post("salary/generate", [SalaryController::class, "generate"])->name("salary.generate");
});

require __DIR__ . "/auth.php";
