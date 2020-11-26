<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailpemesanan extends Model
{
    protected $table = 'detailpemesanan';
    public function katalog()
    {
        return $this->belongsTo('App\katalog','katalog_id','id');
    }
    public function pesanan()
    {
        return $this->belongsTo('App\pemesanan','pesanan_id','id');
    }
}
