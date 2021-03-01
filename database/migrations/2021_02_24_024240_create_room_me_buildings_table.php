<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMeBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_me_buildings', function (Blueprint $table) {
            $table->id('build_id');
            $table->string('build_name');
            $table->double('build_longitude');
            $table->double('build_latitude');
            $table->text('build_photos');
            $table->integer('build_kecamatan');
            $table->biginteger('build_price');
            $table->string('build_userid');
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
        Schema::dropIfExists('room_me_buildings');
    }
}
