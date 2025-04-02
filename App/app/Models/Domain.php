<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',  
        'linked_file', 
    ];
    public function domains()
{
    return $this->belongsToMany(Domain::class, 'domain_template');
}
}
