<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Models\Album;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;

final class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static \BackedEnum|string|null $navigationIcon = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')->required(),
            FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('Albums')
                ->maxSize(2048),
            Select::make('artist_id')
            ->relationship('artist', 'name')
            ->searchable()
            ->preload()
            ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id'),
            TextColumn::make('title')->searchable(),
            ImageColumn::make('image')->label('Image'),
            TextColumn::make('artist.name')->label('Artist'),
        ])
        ->toolbarActions([
            CreateAction::make(),
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
