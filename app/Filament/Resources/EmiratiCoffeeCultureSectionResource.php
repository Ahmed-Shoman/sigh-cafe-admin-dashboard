<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmiratiCoffeeCultureSectionResource\Pages;
use App\Models\EmiratiCoffeeCultureSection;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\KeyValue;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class EmiratiCoffeeCultureSectionResource extends Resource
{
    protected static ?string $model = EmiratiCoffeeCultureSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Emirati Coffee Culture')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),

                    Repeater::make('videos')
                        ->label('Instagram Video Links')
                        ->schema([
                            TextInput::make('url')
                                ->url()
                                ->label('Instagram Reel URL')
                                ->required(),
                        ])
                        ->addActionLabel('Add Video Link')
                        ->columnSpanFull(),

                    Repeater::make('resources')
                        ->label('Resources')
                        ->schema([
                            FileUpload::make('icon')
                                ->image()
                                ->directory('coffee-icons')
                                ->preserveFilenames()
                                ->required(),
                            TextInput::make('link')
                                ->url()
                                ->required(),
                        ])
                        ->addActionLabel('Add Icon & Link')
                        ->columnSpanFull()
                        ->reorderable(),
                ])
                ->columns(1)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('created_at')->dateTime()->since(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmiratiCoffeeCultureSections::route('/'),
            'create' => Pages\CreateEmiratiCoffeeCultureSection::route('/create'),
            'edit' => Pages\EditEmiratiCoffeeCultureSection::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }
}