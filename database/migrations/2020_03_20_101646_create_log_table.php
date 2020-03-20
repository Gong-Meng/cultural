<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('admin_id')->unsigned()->index()->comment('管理员ID');
            $table->string('url', 255)->comment('请求地址');
            $table->string('method', 255)->comment('请求方法');
            $table->string('admin_name', 255)->comment('用户名称');
            $table->text('params')->comment('请求参数');
            $table->string('ip', 255)->index()->comment('IP地址');
            $table->string('user_agent', 255)->comment('用户代理');
            $table->string('content', 255)->comment('日志描述');
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
        Schema::dropIfExists('log');
    }
}
