<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $fillable = [
	    'name',
	    'product_id',
    ];

    public function product() {
    	return $this->belongsTo(Product::class);
    }
}
