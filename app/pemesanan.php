<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = 'pemesanan';
    public function pembeli()
    {
        return $this->belongsTo('App\pembeli','user_id','id');
    }
    public function detailpemesanan()
    {
        return $this->hasMany('App\detailpemesanan','pesanan_id','id');
    }
}
