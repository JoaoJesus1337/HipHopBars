<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rhymes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained()->cascadeOnDelete();
            $table->foreignId('album_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('lyrics');
            $table->unsignedInteger('rank')->default(0); // higher = better
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rhymes');
    }
};
