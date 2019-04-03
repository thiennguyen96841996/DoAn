<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'customer_id',
        'time',
        'table_id',
        'people_number',
        'status',
        'info',
    ];

    const DANGCHO = 0;
    const DAXEPBAN = 1;
    const HUYDAT = 2;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }
}
