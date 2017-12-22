<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->comment('所属商家id');
            $table->string('title')->comment('促销标题');
            $table->enum('promo_type', ['deal', 'code'])->comment('促销类型deal code');
            $table->string('promo_code')->comment('促销码');          
            $table->text('remark')->comment('促销描述');
            $table->dateTime('start_at')->comment('促销开始时间');
            $table->dateTime('expire_at')->comment('促销过期时间');
            $table->string('dst_url')->comment('促销所指页面');
            $table->text('restrict')->comment('促销条款及限制');
            $table->string('editor')->comment('编辑名称');
            $table->timestamps();
            $table->index(['merchant_id', 'start_at', 'expire_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
