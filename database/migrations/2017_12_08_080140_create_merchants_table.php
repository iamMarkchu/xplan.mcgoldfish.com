<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('商家名字');
            $table->enum('country', ['US', 'CA', 'AU', 'UK']);
            $table->string('image_url')->nullable()->default('')->comment('图片链接');
            $table->enum('has_aff', ['yes', 'no'])->comment('有无联盟关系');
            $table->enum('status', ['active', 'deleted', 'pending'])->comment('商家状态');
            $table->string('dst_url')->comment('商家链接');
            $table->string('url_name')->comment('商家站内链接');
            $table->string('facebook_url')->comment('商家facebook链接');
            $table->integer('important_order')->comment('商家排序');
            $table->text('description')->comment('商家描述');
            $table->integer('user_id')->comment('编辑id');
            $table->timestamps();
            $table->unique('name');
            $table->unique('url_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
