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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->float('price')->default(0);
            $table->text('description')->nullable();
            $table->float('netWeight')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->float('depth')->nullable();
            $table->boolean('exclusive')->nullable();
            $table->string('gtin')->nullable();
            $table->float('factorScore')->nullable();
            $table->boolean('isService')->nullable();
            $table->boolean('bonus')->nullable();
            $table->softDeletes();
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
