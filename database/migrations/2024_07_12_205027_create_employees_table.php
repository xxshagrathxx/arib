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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->decimal('salary', 8, 2);

            $table->unsignedBigInteger('parent_id')->nullable(); // If null then it's a manager
            $table->foreign('parent_id')->references('id')->on("employees")->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on("departments")->onUpdate('cascade')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on("users")->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
