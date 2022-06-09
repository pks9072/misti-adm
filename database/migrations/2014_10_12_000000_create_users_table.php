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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('이름');
            $table->string('email')->unique()->comment('이메일');
            $table->timestamp('email_verified_at')->nullable()->comment('이메일 인증');
            $table->string('password')->comment('비밀번호');
            $table->foreignId('grade_id')->constrained()->onDelete('cascade');
            $table->string('phone')->nullable()->comment('휴대폰');
            $table->integer('mileage')->nullable()->default(0)->comment('적립금');
            $table->string('zip')->nullable()->comment('우편번호');
            $table->string('addr1')->nullable()->comment('주소');
            $table->string('addr2')->nullable()->comment('상세주소');
            $table->integer('sms')->nullable()->default(1)->comment('문자수신여부');
            $table->integer('mail')->nullable()->default(1)->comment('이메일수신여부');
            $table->integer('sex')->nullable()->default(1)->comment('성별');
            $table->string('birth')->nullable()->comment('생년월일');
            $table->string('age')->nullable()->comment('연령대');
            $table->integer('lcnt')->nullable()->default(1)->comment('로그인수');
            $table->integer('ocnt')->nullable()->default(0)->comment('누적주문건');
            $table->integer('amount')->nullable()->default(0)->comment('누적결제금액');
            $table->text('memo')->nullable()->comment('메모');
            $table->datetime('ltime')->nullable()->comment('최근로그인');
            $table->string('ci')->nullable()->comment('본인인증코드');
            $table->string('social')->comment('가입채널');
            $table->foreignId('searchad_id')->constrained()->onDelete('cascade');
            $table->string('ip')->comment('가입아이피');
            $table->integer('state')->comment('활성화');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
