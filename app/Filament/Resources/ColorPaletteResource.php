<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColorPaletteResource\Pages;
use App\Models\ColorPalette;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Table;

class ColorPaletteResource extends Resource
{
    protected static ?string $model = ColorPalette::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(\Filament\Forms\Form $form): \Filament\Forms\Form
{
    return $form
        ->schema([
            TextInput::make('name')
                ->required()
                ->label('Palette Name'),
            Forms\Components\Repeater::make('colors')
                ->schema([
                    ColorPicker::make('code')->required()->label('Color'),
                ])
                ->label('Colors')
                ->required()
                ->columns(1),
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')->label('Name'),
            Tables\Columns\ViewColumn::make('colors')
                ->view('components.color-palette') // Buat custom Blade view
                ->label('Colors'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getRelations(): array
    {
        return [
            // Tambahkan relation managers jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColorPalettes::route('/'),
            'create' => Pages\CreateColorPalette::route('/create'),
            'edit' => Pages\EditColorPalette::route('/{record}/edit'),
        ];
    }
}
