<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'product_id', 
        'facebook_pixel', 
        'file_path', 
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function templates()
{
    return $this->belongsToMany(Template::class, 'domain_template');
}
}
