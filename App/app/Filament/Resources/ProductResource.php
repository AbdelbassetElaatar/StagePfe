<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;


class ProductResource extends Resource
{ 
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Shop';
    
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('slug')->required()->unique(Product::class, 'slug',ignoreRecord: true),
            Textarea::make('description')->rows(3)->nullable(),
            TextInput::make('price')->numeric()->required(),
            FileUpload::make('image')->image()->directory('products'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return 
        $table->columns([
            TextColumn::make('id')->sortable(),
            ImageColumn::make('image')->rounded(),
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('price')->sortable(),
            TextColumn::make('created_at')->dateTime(),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
    public function saveImage($image)
    {
    $imagePath = $image->store('productsimages', 'public');

    return Storage::url($imagePath);  // Return the URL to store in the database
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'view' => Pages\ViewProduct::route('/{record}'),
          #  'delete' => Pages\DeleteProduct::route('/{record}/delete'),
        ];
    }
}
