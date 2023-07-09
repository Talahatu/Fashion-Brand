<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = "notes";

    public function user()
    {
        return $this->belongsTo(User::class, "Pembeli_id");
    }

    public function details()
    {
        return $this
            ->hasMany(DetailNote::class, "notes_id");
        // ->join('products', 'detail_notes.products_id', '=', 'products.id')
        // ->withPivot("quantity", 'subTotal');
    }
    protected $dates = ['order_date', 'created_at', 'updated_at'];
    protected $fillable = ['order_date'];
    // public function product()
    // {
    //     return $this->hasManyThrough(Product::class, DetailNote::class, "notes_id", "id");
    // }
}
