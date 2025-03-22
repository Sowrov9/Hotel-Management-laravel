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
        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('bed')->nullable()->after('room_type_id');
            $table->integer('bath')->nullable()->after('bed');
            $table->integer('balcony')->nullable()->after('bath');
            $table->string('price')->nullable()->after('balcony');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn(['bed', 'bath', 'balcony','price']);
        });
    }
};
