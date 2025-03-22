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
        // Schema::table('rooms', function (Blueprint $table) {
        //     $table->file('photo')->nullable()->after('balcony');
        // });
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('balcony'); // Add new column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('rooms', function (Blueprint $table) {
        //     $table->dropColumn('photo');
        // });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('photo'); // Rollback column
        });
    }
};
