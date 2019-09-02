<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listsitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checklist_id')->unsigned();
            $table->text('body');
            $table->boolean('done')->default(false);
            $table->timestamps();
        });

        Schema::table('listsitems', function (Blueprint $table) {
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_items');
    }
}
