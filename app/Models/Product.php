<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'merek_id', 'type_id', 'description', 'price', 'slug'
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
    public function merek()
    {
        return $this->belongsTo(Merek::class, 'mereks_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'types_id', 'id');
    }
}

