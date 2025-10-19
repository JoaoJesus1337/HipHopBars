<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Track extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'name'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function rhymes()
    {
        return $this->hasMany(Rhyme::class);
    }

    public function casts(): array
    {
        return [
            'id' => 'integer',
            'album_id' => 'integer',
            'name' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
