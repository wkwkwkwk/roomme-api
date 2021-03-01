<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_me_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_nama');
            $table->text('user_alamat');
            $table->integer('user_kecamatan');
            $table->double('user_longitude');
            $table->double('user_latitude');
            $table->text('user_photo');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('room_me_users');
    }
}
