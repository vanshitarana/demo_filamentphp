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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id'); // Use unsignedBigInteger for referencing unsigned big integers
            $table->foreign('category_id')->references('id')->on('categories'); // 'categories' instead of 'categorys'
            $table->string('category_name');
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_description'); // 'meta_description' instead of 'meta_desription'
            $table->string('meta_keywords');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
