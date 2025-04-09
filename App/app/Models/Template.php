<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'currency',
        'footer_injection',
        'header_injection',
        'file_path',
        'status'
    ];

    protected $casts = [
        'footer_injection' => 'string',
        'header_injection' => 'string',
    ];

    /**
     * Get all fichiers generated from this template
     */
    public function fichiers(): HasMany
    {
        return $this->hasMany(Fichier::class);
    }
}