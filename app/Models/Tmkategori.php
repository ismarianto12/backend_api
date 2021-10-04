<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Tmkategori extends model
{

    protected $table = 'tmkategori';
    protected $guarded  = [];
    public $incrementing  = false;
    public $timestamps = false;
}
