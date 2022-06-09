<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchads', function (Blueprint $table) {
            $table->id();
            $table->string('adsort')->comment('광고매체');
            $table->string('adtype')->comment('광고종류');
            $table->string('keyword')->comment('키워드');
            $table->string('adcode')->comment('광고코드');
            $table->string('url')->comment('랜딩URL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('searchads');
    }
};
