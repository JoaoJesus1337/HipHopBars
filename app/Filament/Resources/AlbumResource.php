<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Models\Album;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

final class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static \BackedEnum|string|null $navigationIcon = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')->required(),
            Select::make('artist_id')->relationship('artist', 'name')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id'),
            TextColumn::make('title')->searchable(),
            TextColumn::make('artist.name')->label('Artist'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
