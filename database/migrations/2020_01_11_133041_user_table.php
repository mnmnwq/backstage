<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     * 用户表
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键')->autoIncrement();
            $table->string('username')->comment('用户名')->default(0);
            $table->string('password')->comment('密码')->default(0);
            $table->string('salt')->comment('加盐')->default(0);
            $table->string('email')->comment('邮箱')->default(0);
            $table->integer('tel')->comment('手机号码')->default(0);
            $table->unsignedInteger('reg_time')->comment('注册时间')->default(0);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
