<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Task extends Model {
    protected $fillable = ["project_id", "employee_id", "title", "description", "status"];
    public function project() { return $this->belongsTo(Project::class); }
    public function employee() { return $this->belongsTo(Employee::class); }
}
