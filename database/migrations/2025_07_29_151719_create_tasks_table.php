<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('phase', ['study', 'drilling', 'installation', 'finishing']);
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->date('due_date');
            $table->decimal('cost', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
