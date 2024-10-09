<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *
     *
     * Table projects {
     * id int [primary key, increment]
     * title string
     * description text
     * created_at datetime
     * ends_at datetime
     * status string
     * tech_stack json
     * created_by fk [ref: < users.id]
     * }
    *
     *
     *
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('ends_at');
            $table->string('status');
            $table->json('tech_stack');
            $table->foreignIdFor(User::class, 'created_by')->constrained('users');

            //$table->foreignId('created_by')->constrained('users');
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
