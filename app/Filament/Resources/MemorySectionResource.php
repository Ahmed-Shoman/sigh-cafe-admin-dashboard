<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemorySectionResource\Pages;
use App\Models\MemorySection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class MemorySectionResource extends Resource
{
    protected static ?string $model = MemorySection::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Memories')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description')->nullable(),
                    TextInput::make('subtitle')->nullable(),

                    Repeater::make('images')
                        ->label('Images')
                        ->schema([
                            FileUpload::make('path')
                                ->image()
                                ->directory('memories')
                                ->preserveFilenames()
                                ->required(),
                        ])
                        ->addActionLabel('Add Image')
                        ->columnSpanFull()
                        ->reorderable(),
                ])
                ->columns(1)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('subtitle'),
                TextColumn::make('created_at')->dateTime()->since(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemorySections::route('/'),
            'create' => Pages\CreateMemorySection::route('/create'),
            'edit' => Pages\EditMemorySection::route('/{record}/edit'),
        ];
    }
}