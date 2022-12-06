<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemeriksaan_id');
            $table->unsignedBigInteger('obat_id')->nullable();
            $table->unsignedBigInteger('tindakan_id')->nullable();
            $table->timestamps();
            $table->foreign('pemeriksaan_id')->references('id')->on('pemeriksaans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tindakan_id')->references('id')->on('tindakans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaan_details');
    }
}
