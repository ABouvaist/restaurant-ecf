<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->json('monday')->default("");
            $table->json('thursday')->default("");
            $table->json('wednesday')->default("");
            $table->json('tuesday')->default("");
            $table->json('friday')->default("");
            $table->json('saturday')->default("");
            $table->json('sunday')->default("");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opening_hours');
    }
};
