<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'dateReleased', 'author_id'];

    protected $casts = [
        'dateReleased' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}