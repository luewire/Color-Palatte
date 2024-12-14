<?php

namespace App\Filament\Resources\ColorPaletteResource\Pages;

use App\Filament\Resources\ColorPaletteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColorPalette extends EditRecord
{
    protected static string $resource = ColorPaletteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
