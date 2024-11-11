<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'gambar_produk',
        'deskripsi',
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gambar_produk()
    {
        return $this->hasMany(GambarProduk::class);
    }
}
