<?php

namespace App\Models;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function gelery()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function setPathAttribute($image)
    {
        $this->attributes['path'] = ImageService::upload($image);
    }

    
}
