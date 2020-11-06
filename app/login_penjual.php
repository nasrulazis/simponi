<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class login_penjual extends Authenticatable
{
    protected $table='penjual';
}