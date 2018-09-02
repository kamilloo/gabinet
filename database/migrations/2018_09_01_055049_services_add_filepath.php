<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicesAddFilepath extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('disk')->nullable()->default(null)->after('description');
            $table->string('path')->nullable()->default(null)->after('disk');
            $table->string('file')->nullable()->default(null)->after('path');
            $table->dropColumn(['cover', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
