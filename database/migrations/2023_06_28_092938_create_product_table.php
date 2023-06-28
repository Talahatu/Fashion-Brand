<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->enum("size", ["x", "xs", "m", "l", "xxl", "all size", "41", "42", "43"]);
            $table->integer("stock");
            $table->double("price");
            $table->string("url_gambar")->nullable();
            $table->unsignedBigInteger("categories_id");
            $table->unsignedBigInteger("brands_id");
            $table->unsignedBigInteger("types_id");
            $table->timestamps();

            $table->foreign("categories_id")->references("id")->on("categories");
            $table->foreign("brands_id")->references("id")->on("brands");
            $table->foreign("types_id")->references("id")->on("types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
