<?php

namespace App\Filament\Resources;

use App\Models\Domain;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\DomainResource\pages;


class DomainResource extends Resource
{
    protected static ?string $model = Domain::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('linked_file_id')
                ->label('Fichier')
                ->relationship('fichier', 'name')
                ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->name} ({$record->file_path})")
                ->searchable(['name', 'file_path'])
                ->required(),
            Forms\Components\Toggle::make('ssl_enabled')
                ->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                    'maintenance' => 'Maintenance',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fichier.name')
                    ->label('Fichier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fichier.file_path')
                    ->label('File Path')
                    ->searchable(),
                Tables\Columns\IconColumn::make('ssl_enabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        'maintenance' => 'warning',
                    }),
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
        'index' => Pages\ListDomains::route('/'),
        'create' => Pages\CreateDomain::route('/create'),
        'edit' => Pages\EditDomain::route('/{record}/edit'),
    ];
}
}