<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillTable extends Model
{
    use SoftDeletes;

    const WAIT = 0;
    const DONE = 1;

    protected $fillable = [
        'date',
        'customer_id',
        'status',
        'table_id',
        'booking_id',
        'paymented',
    ];
}
