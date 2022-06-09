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
        Schema::create('enters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('searchad_id')->constrained()->onDelete('cascade');
            $table->string('uip')->comment('유입아이피');
            $table->date('wdate')->comment('날짜');
            $table->integer('count')->comment('유입수');
            $table->integer('h00')->nullable()->default(0);
            $table->integer('h01')->nullable()->default(0);
            $table->integer('h02')->nullable()->default(0);
            $table->integer('h03')->nullable()->default(0);
            $table->integer('h04')->nullable()->default(0);
            $table->integer('h05')->nullable()->default(0);
            $table->integer('h06')->nullable()->default(0);
            $table->integer('h07')->nullable()->default(0);
            $table->integer('h08')->nullable()->default(0);
            $table->integer('h09')->nullable()->default(0);
            $table->integer('h10')->nullable()->default(0);
            $table->integer('h11')->nullable()->default(0);
            $table->integer('h12')->nullable()->default(0);
            $table->integer('h13')->nullable()->default(0);
            $table->integer('h14')->nullable()->default(0);
            $table->integer('h15')->nullable()->default(0);
            $table->integer('h16')->nullable()->default(0);
            $table->integer('h17')->nullable()->default(0);
            $table->integer('h18')->nullable()->default(0);
            $table->integer('h19')->nullable()->default(0);
            $table->integer('h20')->nullable()->default(0);
            $table->integer('h21')->nullable()->default(0);
            $table->integer('h22')->nullable()->default(0);
            $table->integer('h23')->nullable()->default(0);
            $table->unique(['uip', 'wdate']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enters');
    }
};
