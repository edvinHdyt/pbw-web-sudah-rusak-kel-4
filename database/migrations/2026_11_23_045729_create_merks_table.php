
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('merks', function (Blueprint $table) {
            $table->string('id_merk', 20)->primary();
            $table->string('merk');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merks');
    }
};
