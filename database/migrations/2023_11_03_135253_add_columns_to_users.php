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
            $table->string('gender')->after('email')->nullable();
            $table->integer('age')->after('gender')->nullable();
            $table->string('relationship')->after('age')->nullable();
            $table->string('country')->after('relationship')->nullable();
            $table->string('state')->after('country')->nullable();
            $table->string('city')->after('state')->nullable();
            $table->integer('start_want_age')->after('city')->nullable();
            $table->integer('end_want_age')->after('start_want_age')->nullable();
            $table->text('favorites')->after('end_want_age')->nullable();
            $table->string('profile_picture')->after('favorites')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('relationship');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('favorites');
        });
    }
};
