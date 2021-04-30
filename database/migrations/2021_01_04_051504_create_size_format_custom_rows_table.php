<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeFormatCustomRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_format_custom_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('specification_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->integer('value_1')->nullable();
            $table->integer('value_2')->nullable();
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
        Schema::dropIfExists('size_format_custom_rows');
    }
}
