<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'content',
        'type',
        'title',
    ];
    /**
     * Get the user that owns the content.
     */
    public function searchHistories()
    {
        return $this->hasMany(SearchHistory::class, 'content_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relasi dengan tabel favorites
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'content_id');
    }
}
