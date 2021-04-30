<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificAlignRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_align_rows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('specification_id')->unsigned()->nullable();
            $table->bigInteger('align_id')->unsigned()->nullable();
            $table->foreign('specification_id')->references('id')->on('specifications')->onDelete('cascade');
            $table->foreign('align_id')->references('id')->on('specific_alignments')->onDelete('cascade');
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
        Schema::dropIfExists('specific_align_rows');
    }
}
