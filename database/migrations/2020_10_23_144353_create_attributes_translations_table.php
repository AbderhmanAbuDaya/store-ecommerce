<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('attribute_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->unique(['attribute_id','locale']);
            $table->foreign('attributes_id')->references('id')->on('attributes')->onDelete('cascade');
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
        Schema::dropIfExists('attributes_translations');
    }
}
