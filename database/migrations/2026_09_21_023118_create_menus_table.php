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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            // Informasi menu
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('price');

            // Food / Drink
            $table->string('category');

            // Group/Grouping untuk menu
            $table->string('group_name');
            $table->string('group_image')->nullable();
            $table->text('group_note')->nullable();

            // Sorting menu
            $table->unsignedInteger('sort_order')->default(0);

            // Foto menu
            $table->string('image')->nullable();

            // Status menu
            $table->boolean('is_available')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};