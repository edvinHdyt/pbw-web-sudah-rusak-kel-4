<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->uuid('id_user_role')->primary();
            
            $table->uuid('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            
            $table->uuid('id_role');
            $table->foreign('id_role')->references('id_roles')->on('roles')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};