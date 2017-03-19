<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectItemsRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_items_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')
                ->unsigned()
                ->foreign()
                ->references('id')->on('object_items')
                ->onDelete('cascade');
            $table->integer('child_id')
                ->unsigned()
                ->foreign()
                ->references('id')->on('object_items')
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
        Schema::dropIfExists('object_items_relations');
    }
}
