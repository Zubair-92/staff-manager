<?php
namespace App\Http\Controllers;
use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller {
    public function index() {
        $salaries = Salary::with("employee")->latest()->get();
        return view("salary.index", compact("salaries"));
    }
    public function generate() {
        $month = date("m");
        $year = date("Y");
        $employees = Employee::where("is_active", true)->get();
        foreach ($employees as $emp) {
            Salary::firstOrCreate(
                ["employee_id" => $emp->id, "month" => $month, "year" => $year],
                ["amount" => $emp->salary, "status" => "unpaid"]
            );
        }
        return back()->with("success", "Salaries generated for this month.");
    }
}
