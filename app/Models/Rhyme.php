<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Rhyme extends Model
{
    use HasFactory;

    protected $fillable = ['artist_id', 'album_id', 'lyrics'];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function casts(): array
    {
        return [
            'id' => 'integer',
            'artist_id' => 'integer',
            'album_id' => 'integer',
            'lyrics' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
