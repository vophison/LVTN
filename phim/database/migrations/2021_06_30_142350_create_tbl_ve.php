<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ve', function (Blueprint $table) {
            $table->Increments('ve_id');
            $table->string('suatchieu_id');
            $table->string('phim_id');
            $table->string('phong_id');
            $table->text('ve_gia');
            $table->date('ve_ngay');
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
        Schema::dropIfExists('tbl_ve');
    }
}
