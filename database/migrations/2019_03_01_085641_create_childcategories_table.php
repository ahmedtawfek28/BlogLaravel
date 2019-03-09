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
        Schema::create('childcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_category_id')->unsigned();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('slug');
            $table->string('image')->default('default.png');
            $table->text('details_ar');
            $table->text('details_en');
            $table->foreign('parent_category_id')
                ->references('id')->on('parentcategories')
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
        Schema::dropIfExists('childcategories');
    }
}
