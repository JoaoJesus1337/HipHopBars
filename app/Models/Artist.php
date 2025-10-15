<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function rhymes()
    {
        return $this->hasMany(Rhyme::class);
    }

    public function casts(): array
    {
        return [
            'id' => 'integer',
            'name' => 'string',
            'slug' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
