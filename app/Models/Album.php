<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'artist_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function rhymes()
    {
        return $this->hasMany(Rhyme::class);
    }

    public function casts(): array
    {
        return [
            'id' => 'integer',
            'title' => 'string',
            'artist_id' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
