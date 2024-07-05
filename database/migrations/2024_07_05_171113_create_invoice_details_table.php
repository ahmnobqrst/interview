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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('lineNo');
            $table->string('productName');
            $table->decimal('price');
            $table->decimal('quantity');
            $table->decimal('total');
            $table->date('expiryDate');
            $table->integer('UnitNo')->unsigned();
            $table->foreign('UnitNo')->references('unitNo')->on('units')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
