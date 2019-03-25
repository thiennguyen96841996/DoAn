<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'info',
        'number_slot',
        'table_group_id',
    ];

    public function tableGroup() {
    	return $this->belongsTo(TableGroup::class);
    }
}
