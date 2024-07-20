<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->string('JUMLAH_KELUARGA');
            $table->string('PENGHASILAN');
            $table->string('PENDIDIKAN_TERTINGGI');
            $table->string('SETATUS_RUMAH');
            $table->string('PEKERJAAN');
            $table->string('KONDISI_KESEHATAN');
            $table->string('prediction_nb');
            $table->string('prediction_c45');
            $table->float('score_nb');
            $table->float('score_c45');
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
        Schema::dropIfExists('predictions');
    }
}
