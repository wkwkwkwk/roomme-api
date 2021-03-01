<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_roles';

    use HasFactory;
    protected $fillable = ['user_id', 'role_id'];
}
