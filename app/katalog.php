<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katalog extends Model
{
    protected $table='katalog';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_tanaman', 'stok', 'harga', 'gambar','id_penjual'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    public function detailpemesanan()
    {
        return $this->hasMany('App\detailpemesanan','katalog_id','id');
    }
}
