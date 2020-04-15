<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pricing_id');
            $table->string('title');
            $table->string('description')->nullable()->default(null);
            $table->unsignedInteger('position')->nullable()->default(null);
            $table->decimal('price');
            $table->string('link')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('pricing_id')->references('id')->on('pricing')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_items');
    }
}
