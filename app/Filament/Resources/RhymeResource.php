<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\RhymeResource\Pages;
use App\Models\Album;
use App\Models\Rhyme;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

final class RhymeResource extends Resource
{
    protected static ?string $model = Rhyme::class;

    protected static \BackedEnum|string|null $navigationIcon = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('artist_id')->relationship('artist', 'name')->required()->reactive(),
            Select::make('album_id')
                ->label('Album')
                ->options(function (Get $get): array {
                    $artistId = $get('artist_id');

                    if (! $artistId) {
                        return [];
                    }

                    return Album::query()
                        ->where('artist_id', $artistId)
                        ->orderBy('title')
                        ->pluck('title', 'id')
                        ->toArray();
                })
                ->disabled(fn ($get) => ! (bool) $get('artist_id')),
            Textarea::make('lyrics')->required()->rows(8),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id'),
            TextColumn::make('artist.name')->label('Artist'),
            TextColumn::make('album.title')->label('Album'),
            TextColumn::make('lyrics')->label('Lyrics'),
        ])
        ->toolbarActions([
            CreateAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRhymes::route('/'),
            'create' => Pages\CreateRhyme::route('/create'),
            'edit' => Pages\EditRhyme::route('/{record}/edit'),
        ];
    }
}
