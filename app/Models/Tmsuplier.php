<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Tmsuplier extends model
{

    protected $table      = 'tmsuplier';
    protected $guarded    = [];
    public $timestamps = false;

    public $incrementing  = false;
}
