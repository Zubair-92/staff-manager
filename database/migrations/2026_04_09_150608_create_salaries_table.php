<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create("salaries", function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained()->onDelete("cascade");
            $table->integer("month");
            $table->integer("year");
            $table->decimal("amount", 10, 2);
            $table->string("status")->default("unpaid"); // unpaid, paid
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists("salaries"); }
};
