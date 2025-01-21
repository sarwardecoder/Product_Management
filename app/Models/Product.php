<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'product_id', 
        'description', 
        'price', 
        'stock', 
        'image  ', 

];

    public static function boot()
    {
        parent::boot();

        // Automatically generate product_id
        static::creating(function ($product) {
            $product->product_id = $product->generateProductId();
        });
    }

    public function generateProductId()
    {
        return strtolower(preg_replace('/\s+/', '-', $this->name)) . '-' . $this->id;
    }
}

