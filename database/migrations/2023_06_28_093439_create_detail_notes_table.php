<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_notes', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->double("subTotal");
            $table->unsignedBigInteger("products_id");
            $table->unsignedBigInteger("notes_id");
            $table->timestamps();

            $table->foreign("products_id")->references("id")->on("products");
            $table->foreign("notes_id")->references("id")->on("notes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_notes');
    }
}
