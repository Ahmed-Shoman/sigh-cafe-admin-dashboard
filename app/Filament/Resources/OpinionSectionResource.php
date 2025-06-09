<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpinionSectionResource\Pages;
use App\Models\OpinionSection;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class OpinionSectionResource extends Resource
{
    protected static ?string $model = OpinionSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Opinions Section')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),

                    Repeater::make('opinions')
                        ->label('Client Opinions')
                        ->schema([
                            FileUpload::make('image')
                                ->image()
                                ->directory('opinions')
                                ->preserveFilenames()
                                ->required(),
                            TextInput::make('name')->required(),
                            TextInput::make('position')->label('Position')->nullable(),
                            TextInput::make('stars')->label('Rating (1-5)')->numeric()->minValue(1)->maxValue(5)->required(),
                            Textarea::make('comment')->label('Comment')->required(),
                        ])
                        ->addActionLabel('Add Opinion')
                        ->columnSpanFull()
                        ->reorderable(),
                ])
                ->columns(1),
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
            'index' => Pages\ListOpinionSections::route('/'),
            'create' => Pages\CreateOpinionSection::route('/create'),
            'edit' => Pages\EditOpinionSection::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }
}