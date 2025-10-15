<?php

declare(strict_types=1);

namespace App\Filament\Resources\RhymeResource\Pages;

use App\Filament\Resources\RhymeResource;
use Filament\Resources\Pages\ListRecords;

final class ListRhymes extends ListRecords
{
    protected static string $resource = RhymeResource::class;
}
