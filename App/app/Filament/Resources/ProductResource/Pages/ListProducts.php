<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->label('Product Name'),
            Tables\Columns\ImageColumn::make('image') // Using ImageColumn for image display
                ->label('Product Image')
                ->getUrl(fn ($record) => asset('storage/products/' . $record->image))
                ->sortable(),
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
