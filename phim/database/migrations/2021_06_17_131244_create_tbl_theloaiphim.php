<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTheloaiphim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_theloaiphim', function (Blueprint $table) {
            $table->Increments('theloaiphim_id');
            $table->string('theloaiphim_name');
            $table->text('theloaiphim_desc');
            $table->integer('theloaiphim_status');
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
        Schema::dropIfExists('tbl_theloaiphim');
    }
}
