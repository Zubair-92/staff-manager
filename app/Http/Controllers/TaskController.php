<?php
namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        $tasks = Task::with(["project", "employee"])->latest()->get();
        return view("tasks.index", compact("tasks"));
    }
    public function create() {
        $projects = Project::all();
        $employees = Employee::all();
        return view("tasks.create", compact("projects", "employees"));
    }
    public function store(Request $request) {
        $data = $request->validate(["project_id" => "required", "employee_id" => "required", "title" => "required", "status" => "required"]);
        Task::create($data);
        return redirect()->route("tasks.index")->with("success", "Task assigned.");
    }
}
