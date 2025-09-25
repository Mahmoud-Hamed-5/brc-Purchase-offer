<?php

use App\Models\Tender;
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
        Schema::create('tenders', function (Blueprint $table)  {
            $table->bigIncrements('id');
            $table->enum('tender_type', [Tender::TYPE_INTERNAL, Tender::TYPE_EXTERNAL]);
            $table->string('tender_number');

            $table->string('title');
            $table->text('details');

            $table->bigInteger('bond_cost');
            $table->enum('bond_currency', Tender::CURRENCIES);
            $table->text('bond_details')->nullable();

            $table->bigInteger('tender_cost');
            $table->enum('tender_cost_currency', Tender::CURRENCIES);
            $table->text('tender_cost_details')->nullable();

            $table->date('close_date');

            $table->boolean('publish_status');

            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
