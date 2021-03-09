<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $fillable = ["name", "type", "price", "limit_chars", "required"];
    protected $casts = [
        "name" => Json::class,
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }
}