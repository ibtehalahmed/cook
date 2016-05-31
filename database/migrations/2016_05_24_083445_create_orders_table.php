<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');;
            $table->integer('meal_id')->unsigned()->references('id')->on('meals')->onDelete('cascade');;
            $table->integer('quantity')->default(1);
            $table->float('delever_time');
            $table->boolean('is_confirm');
            $table->string('comment');
            $table->float('rating');
            $table->timestamp('created_at');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::drop('orders');
    }
}
