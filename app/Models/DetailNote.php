<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailNote extends Model
{
    use HasFactory;

    protected $table = "detail_notes";

    public function note()
    {
        return $this->belongsTo(Note::class, "notes_id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "products_id")
            // ->join('products', 'detail_notes.products_id', '=', 'products.id')
            // ->withPivot("quantity", 'subTotal')
        ;
    }
}
