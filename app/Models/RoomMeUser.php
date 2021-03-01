<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMeUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room_me_users';
    
    use HasFactory;
    protected $fillable = ['user_nama', 'user_alamat', 'user_kecamatan', 'user_kabupaten', 'user_provinsi', 'user_longitude', 'user_latitude', 'user_photo', 'username', 'password'];
}
