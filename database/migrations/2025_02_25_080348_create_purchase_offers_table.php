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
        Schema::create('purchase_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('offer_number');
            $table->text('material_type');
            $table->date('ad_date');
            $table->date('close_date');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_offers');
    }
};
