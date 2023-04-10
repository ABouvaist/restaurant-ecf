<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_dish_id')->constrained('restaurant_dishes');
            $table->foreignId('dish_category_id')->constrained('dish_categories');
            $table->string('title');
            $table->string('description');
            $table->float('price');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
