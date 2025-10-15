<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            if (Schema::hasColumn('artists', 'slug')) {
                $table->dropUnique(['slug']);
                $table->dropColumn('slug');
            }

            if (! Schema::hasColumn('artists', 'image')) {
                $table->string('image')->nullable()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            if (! Schema::hasColumn('artists', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }

            if (Schema::hasColumn('artists', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};
