<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menu_formulas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_menu_id')->constrained('restaurant_menus');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_formulas');
    }
};
