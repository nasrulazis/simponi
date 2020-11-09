<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertumbuhan_tanaman extends Model
{
    protected $table='pertumbuhan_tanaman';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal_penanaman', 'suhu_ruangan', 'nutrisi', 'jenis_tanaman','id_penjual'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
