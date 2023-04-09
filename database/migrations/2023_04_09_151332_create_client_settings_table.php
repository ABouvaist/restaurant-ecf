<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('client_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('numberOfGuests');
            $table->json('allergies');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_settings');
    }
};
