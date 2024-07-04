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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('proposed_project');
            $table->string('project_name');
            $table->date('start_date');
            $table->date('deadline');
            $table->string('cost');
            $table->string('project_location');
            $table->string('final_image')->nullable();
            $table->longText('description');
            $table->string('status');

            $table->unsignedBigInteger('assign_team');
            $table->unsignedBigInteger('customer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
