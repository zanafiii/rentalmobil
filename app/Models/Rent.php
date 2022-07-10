<?php

namespace App\Models;

use App\Models\Merek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id', 'users_id', 'tanggal_sewa', 'lama_sewa', 'total_harga', 'status'
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function merek(){
        return $this->hasOneThrough(Merek::class, Product::class);
    }
}

