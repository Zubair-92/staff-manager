<?php
namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    public function index() {
        $projects = Project::latest()->get();
        return view("projects.index", compact("projects"));
    }
    public function create() { return view("projects.create"); }
    public function store(Request $request) {
        $data = $request->validate(["name" => "required", "description" => "nullable", "deadline" => "required|date"]);
        Project::create($data);
        return redirect()->route("projects.index")->with("success", "Project created.");
    }
}
