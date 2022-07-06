<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id', 'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'jenis_id', 'id');
    }
}
