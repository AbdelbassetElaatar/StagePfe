<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemplateResource\Pages;
use App\Filament\Resources\TemplateResource\RelationManagers;
use App\Models\Template;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->unique(ignoreRecord: true)
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, $set) {
                    $set('filename', Str::slug($state).'.blade.php');
                }),
            Forms\Components\TextInput::make('currency')
                ->default('MAD'),
            Forms\Components\FileUpload::make('template_file')
                ->label('Blade Template')
                ->required()
                ->acceptedFileTypes(['text/x-blade']) // MIME type
                ->rules([
                    'required',
                    'file',
                    'mimetypes:text/x-blade', // Server-side validation
                    'mimes:blade.php', // File extension validation
                ])
                ->directory('templates') // Storage directory
                ->preserveFilenames(false)
                ->columnSpanFull(),
  
            Forms\Components\Textarea::make('header_injection')
                ->columnSpanFull(),
    
            Forms\Components\Textarea::make('footer_injection')
                ->columnSpanFull(),
    
            
        ]);
    }
    
    public static function afterCreate(Model $record, array $data): void
    {
        $record->update(['name' => $data['name']]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplates::route('/'),
            'create' => Pages\CreateTemplate::route('/create'),
            'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }
}
