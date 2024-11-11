<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'query'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // or whatever your foreign key is
    }

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }
}
