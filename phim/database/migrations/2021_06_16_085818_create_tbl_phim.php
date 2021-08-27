<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPhim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phim', function (Blueprint $table) {
            $table->Increments('phim_id');
            $table->integer('category_id');
            $table->string('phim_name');
            $table->text('phim_noidung');
            $table->string('phim_gia');
            $table->string('phim_image');
            $table->text('phim_quocgia');
            $table->text('phim_daodien');
            $table->text('phim_trailer');
            $table->integer('phim_status');
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
        Schema::dropIfExists('tbl_phim');
    }
}
