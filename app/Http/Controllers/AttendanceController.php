<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller {
    public function index() {
        $employees = Employee::where("is_active", true)->get();
        return view("attendance.index", compact("employees"));
    }
    public function store(Request $request) {
        foreach ($request->attendance as $data) {
            Attendance::updateOrCreate(
                ["employee_id" => $data["employee_id"], "date" => date("Y-m-d")],
                ["status" => $data["status"], "clock_in" => $data["clock_in"], "clock_out" => $data["clock_out"]]
            );
        }
        return back()->with("success", "Attendance recorded for today.");
    }
}
