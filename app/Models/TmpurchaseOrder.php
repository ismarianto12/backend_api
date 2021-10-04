<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmpurchaseOrder extends Model
{
    protected $table = 'tmpurchaseorder';
    protected $guarded  = [];
    public $incrementing  = false;
    public $timestamps = false;
}
