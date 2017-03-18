<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectItems_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')
                ->unsigned()
                ->foreign()
                ->references('id')->on('objectItems')
                ->onDelete('cascade');
            $table->integer('child_id')
                ->unsigned()
                ->foreign()
                ->references('id')->on('objectItems')
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
        Schema::dropIfExists('objectItems_relations');
    }
}
