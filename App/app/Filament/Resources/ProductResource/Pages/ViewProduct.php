<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\ViewRecord;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;
    protected function getFormSchema(): array
    {
        return [
            // Other fields here...
            \Filament\Forms\Components\Image::make('image')
                ->label('Product Image')
                ->image() // Ensures the image is displayed as an actual image
                ->getUrl(fn ($record) => asset('storage/products/' . $record->image)),
        ];
    }
}
