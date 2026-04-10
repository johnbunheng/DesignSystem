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
        Schema::table('designs', function (Blueprint $table) {
            $table->foreignId('designer_id')->nullable()->constrained('users')->nullOnDelete()->after('type');
            $table->text('more')->nullable()->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('designs', function (Blueprint $table) {
            $table->dropForeign(['designer_id']);
            $table->dropColumn(['designer_id', 'more']);
        });
    }
};