<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
    public function index() {
        $employees = Employee::latest()->get();
        return view("employees.index", compact("employees"));
    }
    public function create() {
        return view("employees.create");
    }
    public function store(Request $request) {
        $data = $request->validate([
            "first_name" => "required", "last_name" => "required",
            "email" => "required|unique:employees", "role" => "required",
            "joining_date" => "required|date", "salary" => "required|numeric"
        ]);
        Employee::create($data);
        return redirect()->route("employees.index")->with("success", "Employee added successfully.");
    }
}
