<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tambah_katalog extends Authenticatable
{
    use Notifiable;
    protected $table='tanaman';
    
}