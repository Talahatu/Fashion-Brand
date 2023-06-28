<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->date("order_date");
            $table->double("total");
            $table->unsignedBigInteger("Pembeli_id");
            $table->unsignedBigInteger("Discount_id");
            $table->unsignedBigInteger("Staff_id");
            $table->timestamps();

            $table->foreign("Pembeli_id")->references("id")->on("users");
            $table->foreign("Discount_id")->references("id")->on("discounts");
            $table->foreign("Staff_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
