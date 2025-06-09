<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryArticleSectionResource\Pages;
use App\Models\StoryArticleSection;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class StoryArticleSectionResource extends Resource
{
    protected static ?string $model = StoryArticleSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Site Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Stories and Articles')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('description'),
                    TextInput::make('subtitle'),

                    Repeater::make('items')
                        ->label('Items')
                        ->schema([
                            FileUpload::make('image')
                                ->image()
                                ->directory('stories')
                                ->preserveFilenames()
                                ->required(),

                            TextInput::make('cta_button.text')->label('CTA Text')->required(),
                            TextInput::make('cta_button.link')->label('CTA Link')->url()->required(),

                            Textarea::make('history')->label('Story/Article History'),
                            TextInput::make('views')->numeric()->label('Number of Views'),
                        ])
                        ->reorderable()
                        ->addActionLabel('Add Story/Article')
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
                TextColumn::make('subtitle'),
                TextColumn::make('created_at')->dateTime()->since(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStoryArticleSections::route('/'),
            'create' => Pages\CreateStoryArticleSection::route('/create'),
            'edit' => Pages\EditStoryArticleSection::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [];
    }
}