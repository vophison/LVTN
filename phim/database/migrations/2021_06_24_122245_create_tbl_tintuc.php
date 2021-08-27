<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tintuc', function (Blueprint $table) {
            $table->Increments('tintuc_id');
            $table->string('tintuc_tieude');
            $table->string('tintuc_image');
            $table->text('tintuc_noidung');
            $table->integer('tintuc_status');
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
        Schema::dropIfExists('tbl_tintuc');
    }
}
