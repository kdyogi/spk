<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Admin;
use App\CalonSiswa;

class Pengguna extends Authenticatable
{
    use Notifiable;

    // protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ([
        'email',
        'password',
        'level_user'
    ]);

    protected $table = 'users';
}
