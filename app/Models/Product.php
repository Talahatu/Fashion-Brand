<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brands_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discounts_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'types_id');
    }
}
