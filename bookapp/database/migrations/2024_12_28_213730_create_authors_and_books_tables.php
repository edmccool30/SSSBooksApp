<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ensure authors table exists before creating books
        Schema::create('authors', function (Blueprint $table) {
            $table->id();  // id as the primary key
            $table->string('name');
            $table->date('birthdate')->nullable();
            $table->string('nationality');
            $table->timestamps();
        });

        // Now create books table
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('dateReleased');
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_and_books_tables');
    }
};
