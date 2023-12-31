<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteStaffNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(["Staff_id"]);
            $table->dropColumn("Staff_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('notes', function (Blueprint $table) {
        //     $table->unsignedBigInteger("Staff_id");
        //     $table->foreign("Staff_id")->references("id")->on("users");
        // });
    }
}
