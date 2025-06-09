<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PreparationProcessResource\Pages;
use App\Models\PreparationProcess;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PreparationProcessResource extends Resource
{
    protected static ?string $model = PreparationProcess::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Preparation Process')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),

                    Repeater::make('steps')
                        ->label('Process Steps')
                        ->schema([
                            FileUpload::make('icon')
                                ->image()
                                ->directory('preparation')
                                ->preserveFilenames()
                                ->required(),
                            TextInput::make('text')->label('Title')->required(),
                            TextInput::make('subtext')->label('Subtext')->nullable(),
                        ])
                        ->reorderable()
                        ->addActionLabel('Add Step')
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
            'index' => Pages\ListPreparationProcesses::route('/'),
            'create' => Pages\CreatePreparationProcess::route('/create'),
            'edit' => Pages\EditPreparationProcess::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }
}