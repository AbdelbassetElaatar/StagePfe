<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Fichier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'template_id',
        'product_id',
        'header_injection',
        'footer_injection'
    ];

    /**
     * Get the template used for this fichier
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Get the product featured in this fichier
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all domains using this fichier
     */
    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class, 'linked_file_id');
    }
    protected static function boot()
{
    parent::boot();

    static::creating(function ($fichier) {
        $fichier->file_path = 'generated/' . Str::slug($fichier->name) . '-' . time() . '.blade.php';
    });
}
}