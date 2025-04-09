<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'price',
        'status',
        'sku',
        'stock_quantity',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock_quantity' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = $product->slug ?? Str::slug($product->name);
        });
    }

    /**
     * Get all fichiers featuring this product
     */
    public function fichiers(): HasMany
    {
        return $this->hasMany(Fichier::class);
    }
}