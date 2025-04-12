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
        Schema::create('ipnu', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('position');
            $table->date('born');
            $table->longText('address');
            $table->string('periode1');
            $table->string('periode2');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipnu');
    }
};
