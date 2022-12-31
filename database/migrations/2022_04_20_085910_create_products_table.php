<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->string('img',250)->nullable();
            $table->string('face_material')->nullable();/* Chất liệu mặt */
            $table->string('shell_material')->nullable();/*Chất liệu vỏ */
            $table->string('wire_material')->nullable();/* Chất liệu dây */
            $table->string('power')->nullable();/* Năng lương */
            $table->string('waterproof')->nullable(); /* Chống nước */
            $table->integer('quantity');
            $table->integer('diameter')->nullable(); /* Đường kính */
         //   $table->integer('resistance')->nullable();/*??? */
            $table->integer('size')->nullable();/* Size dây */
            $table->integer('insurance')->nullable();/* Bảo hành */
            $table->integer('cate_id');
            $table->integer('origin_id');/* Xuất xứ */
         //   $table->integer('img_id');
            $table->integer('discount_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
