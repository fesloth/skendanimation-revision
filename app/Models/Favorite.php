<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'content_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Content
    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }
}
