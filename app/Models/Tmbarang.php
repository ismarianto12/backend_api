<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Tmbarang extends model
{

    protected $table = 'tmbarang';
    protected $fillable = [
        'kode',
        'nama',
        'harga_beli',
        'harga_jual',
        'kategori_id',
        'suplier_id',
        'stok',
        'date_created',
        'user_id'
    ];

    // public $incrementing  = false;
    public $timestamps = false;
    // protected $guarded  = [];
}
