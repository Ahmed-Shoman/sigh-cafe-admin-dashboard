<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Hero Section')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),
                    Repeater::make('cta_button')
                        ->schema([
                            TextInput::make('text')->required(),
                            TextInput::make('link')->url()->required(),
                        ])
                        ->maxItems(1)
                        ->addActionLabel('Set Button')
                        ->reorderable(false),
                    FileUpload::make('media')
                        ->label('Image or Video')
                        ->directory('hero')
                        ->preserveFilenames()
                        ->columnSpanFull(),
                ])
                ->columns(1)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('cta_button.text')->label('Button Text'),
                TextColumn::make('cta_button.link')->label('Button Link'),
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}
