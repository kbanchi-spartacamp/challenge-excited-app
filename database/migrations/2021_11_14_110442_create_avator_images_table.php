<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatorImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avator_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avator_category_id')
                ->constrained('avator_categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->integer('level');
            $table->text('image_path');
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
        Schema::dropIfExists('avator_images');
    }
}
