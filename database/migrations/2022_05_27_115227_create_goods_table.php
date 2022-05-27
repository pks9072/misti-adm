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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_id')->nullable()->default(0)->constrained()->onDelete('cascade')->comment('제휴사');
            $table->string('aidx')->nullable()->default('')->comment('제휴사 상품코드');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade')->comment('브랜드');
            $table->foreignId('section_id')->constrained()->onDelete('cascade')->comment('대분류');
            $table->foreignId('division_id')->constrained()->onDelete('cascade')->comment('중분류');
            $table->foreignId('grp_id')->constrained()->onDelete('cascade')->comment('소분류');
            $table->string('name')->comment('상품명');
            $table->integer('normal_price')->comment('정상가');
            $table->integer('sale_price')->nullable()->default(0)->comment('할인');
            $table->integer('price')->comment('판매가');
            $table->json('icon')->nullable()->comment('아이콘');
            $table->string('tag')->default(0);
            $table->integer('state');
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
        Schema::dropIfExists('goods');
    }
};
