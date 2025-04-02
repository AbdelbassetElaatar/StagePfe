<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomainTemplate extends Model
{
    use HasFactory;

    protected $table = 'domain_template'; 

    protected $fillable = [
        'domain_id',
        'template_id',
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}