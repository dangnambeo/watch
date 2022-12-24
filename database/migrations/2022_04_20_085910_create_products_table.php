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
            $table->string('img',250)->nullable();
            $table->string('face_material')->nullable();
            $table->string('shell_material')->nullable();
            $table->string('wire_material')->nullable();
            $table->integer('quantity');
            $table->integer('diameter')->nullable(); /* Đường kính */
            $table->integer('resistance')->nullable();
            $table->integer('size')->nullable();
            $table->integer('insurance')->nullable();
            $table->integer('cate_id');
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
