<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["title", "price", "product_category_id"];
    protected $casts = [
        "title" => Json::class,
    ];
    public function attributes()
    {
        return $this->belongsToMany(ProductAttribute::class);
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}