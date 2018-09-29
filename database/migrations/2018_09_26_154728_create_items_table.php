<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->default(0);
            $table->integer('brand_id')->default(0);
            $table->integer('colour_id')->default(0);
            $table->string('primary_image');
            $table->string('secondary_image');
            $table->boolean('new');
            $table->decimal('price', 8,2)->default(0.00);
            $table->decimal('discount', 6,2)->default(0.00);
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
        Schema::dropIfExists('items');
    }
}
