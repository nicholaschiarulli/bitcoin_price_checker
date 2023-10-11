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
        Schema::create('Inquiry', function (Blueprint $table) {
            $table->increments('InquiryId');
            $table->string('CurrencyType', 10)->nullable()->default(null);
            $table->decimal('CurrencyValue')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Inquiry');
    }
};
