<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'info',
        'supplier_group_id'
    ];

    public function supplierGroup() {
    	return $this->belongsTo(SupplierGroup::class);
    }
}
