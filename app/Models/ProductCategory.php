<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'content'];
    protected $casts = [
        'name' => Json::class,
        'content' => Json::class
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}