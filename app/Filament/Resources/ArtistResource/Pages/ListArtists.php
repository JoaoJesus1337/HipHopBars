<?php

declare(strict_types=1);

namespace App\Filament\Resources\ArtistResource\Pages;

use App\Filament\Resources\ArtistResource;
use Filament\Resources\Pages\ListRecords;

final class ListArtists extends ListRecords
{
    protected static string $resource = ArtistResource::class;

}
