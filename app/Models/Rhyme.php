<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Rhyme extends Model
{
    use HasFactory;

    protected $fillable = ['artist_id', 'album_id', 'title', 'lyrics', 'rank'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function casts(): array
    {
        return [
            'id' => 'integer',
            'artist_id' => 'integer',
            'album_id' => 'integer',
            'title' => 'string',
            'lyrics' => 'string',
            'rank' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
