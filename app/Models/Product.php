<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
	    'name',
	    'purchase_price',
	    'describe',
	    'sale_price',
	    'bua',
	    'unit',
	    'quantity',
	    'category_id',
    ];

    public function images() {
    	return $this->hasMany(Image::class);
    }

    public function category() {
    	return $this->belongsTo(Category::class);
    }
}
