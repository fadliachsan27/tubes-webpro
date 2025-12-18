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
            // Identitas dasar
            $table->string('name');
            $table->string('username')->nullable()->unique();

            // Kontak
            $table->string('email')->unique();
            $table->string('phone')->nullable();

            // Data pribadi
            $table->string('gender')->nullable(); // male / female
            $table->date('birth_date')->nullable();

            // Alamat
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();

            // Foto profil
            $table->string('avatar')->nullable(); // path foto

            // Informasi akun
            $table->string('role')->default('user');
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
