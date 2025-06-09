<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatisticSectionResource\Pages;
use App\Models\StatisticSection;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class StatisticSectionResource extends Resource
{
    protected static ?string $model = StatisticSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Statistics')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),

                    Repeater::make('stats')
                        ->label('Statistics Items')
                        ->schema([
                            FileUpload::make('icon')
                                ->image()
                                ->directory('statistics')
                                ->preserveFilenames()
                                ->required(),
                            TextInput::make('number')->required()->numeric(),
                            TextInput::make('text')->required(),
                        ])
                        ->reorderable()
                        ->addActionLabel('Add Stat')
                        ->columnSpanFull(),
                ])
                ->columns(1)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('created_at')->dateTime()->since(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatisticSections::route('/'),
            'create' => Pages\CreateStatisticSection::route('/create'),
            'edit' => Pages\EditStatisticSection::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }
}