<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillTableDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'bill_table_id',
        'product_id',
        'quantity',
        'total',
    ];
}
