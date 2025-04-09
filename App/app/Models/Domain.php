<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'linked_file_id',
        'status',
        'ssl_enabled',
        'dns_verified',
        'analytics_id'
    ];

    protected $casts = [
        'ssl_enabled' => 'boolean',
        'dns_verified' => 'boolean'
    ];

    /**
     * Get the fichier linked to this domain
     */
    public function fichier(): BelongsTo
    {
        return $this->belongsTo(Fichier::class, 'linked_file_id');
    }
}