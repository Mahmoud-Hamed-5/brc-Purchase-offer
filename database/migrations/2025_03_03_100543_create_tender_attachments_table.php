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
        Schema::create('tender_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('tender_id')->constrained('tenders')->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_url');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tender_attachments');
    }
};
