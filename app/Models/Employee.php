<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model {
    protected $fillable = ["first_name", "last_name", "email", "phone", "role", "joining_date", "salary", "is_active"];
    public function tasks() { return $this->hasMany(Task::class); }
    public function attendances() { return $this->hasMany(Attendance::class); }
    public function salaries() { return $this->hasMany(Salary::class); }
    public function getFullNameAttribute() { return "{$this->first_name} {$this->last_name}"; }
}
