<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create("attendances", function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained()->onDelete("cascade");
            $table->date("date");
            $table->time("clock_in")->nullable();
            $table->time("clock_out")->nullable();
            $table->string("status")->default("present"); // present, absent, leave
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists("attendances"); }
};
