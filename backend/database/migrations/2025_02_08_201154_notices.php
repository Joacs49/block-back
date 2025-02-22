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
        Schema::create('notices', function(Blueprint $table) {
            $table->increments('id_notice');
            $table->string('title', 150);
            $table->string('paragraph',255);
            $table->string('img', 255);
            $table->string('url', 2048);
            $table->date('fechaPublicacion')->useCurrent();
            $table->time('horaPublicacion')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
