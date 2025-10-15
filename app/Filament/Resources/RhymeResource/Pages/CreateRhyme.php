<?php

declare(strict_types=1);

namespace App\Filament\Resources\RhymeResource\Pages;

use App\Filament\Resources\RhymeResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateRhyme extends CreateRecord
{
    protected static string $resource = RhymeResource::class;
}
