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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('gname')->comment('등급명');
            $table->decimal('mileage', 3, 1)->default(00.0)->comment('적립율');
            $table->decimal('sale', 3, 1)->default(00.0)->comment('할인율');
            $table->string('icon')->nullable()->comment('등급아이콘');
            $table->integer('levelup')->comment('승급조건');
            $table->integer('state')->comment('활성화');
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
        Schema::dropIfExists('grades');
    }
};
