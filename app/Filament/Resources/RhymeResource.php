<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\RhymeResource\Pages;
use App\Models\Rhyme;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
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
            TextInput::make('title')->required(),
            Select::make('artist_id')->relationship('artist', 'name')->required(),
            Select::make('album_id')->relationship('album', 'title'),
            Textarea::make('lyrics')->required()->rows(8),
            TextInput::make('rank')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id'),
            TextColumn::make('title')->searchable(),
            TextColumn::make('artist.name')->label('Artist'),
            TextColumn::make('album.title')->label('Album'),
            TextColumn::make('rank')->sortable(),
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
