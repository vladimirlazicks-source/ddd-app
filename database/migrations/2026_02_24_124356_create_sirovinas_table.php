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
        Schema::create('sirovine', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->decimal('kolicina', 10, 2)->default(0);
            $table->string('jedinica_mere')->default('kg');
            $table->decimal('minimalna_kolicina', 10, 2)->default(5);
            $table->foreignId('dobavljac_id')->nullable()->constrained();
            $table->text('napomena')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sirovine');
    }
};