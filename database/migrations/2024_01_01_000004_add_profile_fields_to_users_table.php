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
        Schema::table('users', function (Blueprint $table) {
            $table->string('owner_name')->nullable()->after('password');
            $table->text('owner_bio')->nullable()->after('owner_name');
            $table->string('owner_phone')->nullable()->after('owner_bio');
            $table->string('owner_address')->nullable()->after('owner_phone');
            $table->string('owner_photo')->nullable()->after('owner_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['owner_name', 'owner_bio', 'owner_phone', 'owner_address', 'owner_photo']);
        });
    }
};

