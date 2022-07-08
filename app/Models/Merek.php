<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merek extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id', 'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'mereks_id', 'id');
    }

}
