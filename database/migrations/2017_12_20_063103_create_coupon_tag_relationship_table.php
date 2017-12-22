<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTagRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_tag_relationship', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coupon_id')->comment('促销id');
            $table->integer('tag_id')->comment('促销id');
            $table->timestamps();
            $table->unique(['coupon_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_tag_relationship');
    }
}
