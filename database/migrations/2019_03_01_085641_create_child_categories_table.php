<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_categories_id')->unsigned();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('slug');
            $table->string('image')->default('default.png');
            $table->text('details_ar');
            $table->text('details_en');
            $table->foreign('parent_categories_id')
                ->references('id')->on('parent_categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('child_categories');
    }
}
