<?php

declare(strict_types=1);

namespace App\Filament\Resources\AlbumResource\Pages;

use App\Filament\Resources\AlbumResource;
use Filament\Resources\Pages\EditRecord;

final class EditAlbum extends EditRecord
{
    protected static string $resource = AlbumResource::class;
}
