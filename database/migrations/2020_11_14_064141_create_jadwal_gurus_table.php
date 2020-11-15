<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_gurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mapel_id', 11);
            $table->string('guru_id', 11)->nullable()->default(null);
            $table->string('jadwal_id');
            $table->string('hari', 1);
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
        Schema::dropIfExists('jadwal_gurus');
    }
}
