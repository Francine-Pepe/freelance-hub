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

            $table->foreignId('client_id') // this line created the client id column in the projects table and set it as a foreign key referencing the id column in the clients table
                ->constrained() //This references the clients table.
                ->cascadeOnDelete(); //If a client is deleted, delete that client’s projects too.
                
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('budget', 10, 2)->nullable();$table->timestamps();
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
