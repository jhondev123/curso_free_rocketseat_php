<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Table proposals {
     * id int [primary key, increment]
     * email string
     * hours int
     * project_id fk [ref: < projects.id]
     *
     * }
     */
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->smallInteger('hours');
            $table->foreignIdFor(\App\Models\Project::class, 'project_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
