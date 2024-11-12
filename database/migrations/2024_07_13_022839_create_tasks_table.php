<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->unsignedBigInteger('assigner_id')->nullable();
            $table->foreign('assigner_id')->references('id')->on("employees")->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('assignee_id')->nullable();
            $table->foreign('assignee_id')->references('id')->on("employees")->onUpdate('cascade')->onDelete('cascade');

            $table->enum('status', ['Backlog', 'In Progress', 'Done'])->default('Backlog');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
