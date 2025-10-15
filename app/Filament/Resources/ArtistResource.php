<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistResource\Pages;
use App\Models\Artist;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;

final class ArtistResource extends Resource
{
    protected static ?string $model = Artist::class;

    protected static \BackedEnum|string|null $navigationIcon = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')->required()->reactive(),
            FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('Artists')
                ->preserveFilenames(false)
                ->maxSize(2048),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                ImageColumn::make('image')->label('Image'),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->toolbarActions([
            CreateAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtists::route('/'),
            'create' => Pages\CreateArtist::route('/create'),
            'edit' => Pages\EditArtist::route('/{record}/edit'),
        ];
    }
}
