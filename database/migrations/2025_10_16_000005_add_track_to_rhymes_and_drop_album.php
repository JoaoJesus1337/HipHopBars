<?php

declare(strict_types=1);

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
        Schema::table('rhymes', function (Blueprint $table): void {
            if (! Schema::hasColumn('rhymes', 'track_id')) {
                $table->foreignId('track_id')->nullable()->after('artist_id')->constrained('tracks')->nullOnDelete();
            }

            if (Schema::hasColumn('rhymes', 'album_id')) {
                $table->dropForeign(['album_id']);
                $table->dropColumn('album_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rhymes', function (Blueprint $table): void {
            if (! Schema::hasColumn('rhymes', 'album_id')) {
                $table->foreignId('album_id')->nullable()->after('artist_id')->constrained()->nullOnDelete();
            }

            if (Schema::hasColumn('rhymes', 'track_id')) {
                $table->dropForeign(['track_id']);
                $table->dropColumn('track_id');
            }
        });
    }
};
