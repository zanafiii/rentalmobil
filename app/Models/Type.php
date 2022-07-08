<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id', 'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'types_id', 'id');
    }
}
