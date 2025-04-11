<?php

namespace App\Filament\Resources;

use App\Models\Fichier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Filament\Resources\FichierResource\Pages;

class FichierResource extends Resource
{
    protected static ?string $model = Fichier::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, Forms\Set $set) {
                    $set('file_path', 'generated/' . Str::slug($state) . '.blade.php');
                }),
            Forms\Components\Select::make('template_id')
                ->relationship('template', 'name')
                ->required(),
            Forms\Components\Select::make('product_id')
                ->relationship('product', 'name')
                ->required(),
            Forms\Components\Textarea::make('header_injection')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('footer_injection')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('file_path')
            ->required()
            ->default('generated/'.Str::slug(now()->timestamp).'.blade.php')
                ->visibleOn('view')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('template.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relation managers if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFichiers::route('/'),
            'create' => Pages\CreateFichier::route('/create'),
            'edit' => Pages\EditFichier::route('/{record}/edit'),
        ];
    }
}